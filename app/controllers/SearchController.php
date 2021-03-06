<?php

class SearchController extends BaseController {
    public function index()
    {
        return View::make("search/search");
    }

    public function results()
    {
        $query = Input::get("search");
        $startDate = Input::get("startDate");
        $endDate = Input::get("endDate");
        $sorting = Input::get("sorting");

        // if no search supplied, error
        if($query == "" && $startDate == "" && $endDate == "")
            return Redirect::route("search")->withErrors(array("Must include a search term or date range."));

        // get all relevant columns
        $statement = "select r.record_id, r.test_type, r.prescribing_date,
                             r.test_date, r.diagnosis, r.description,
                             p.first_name as patient_first_name,
                             p.last_name as patient_last_name,
                             d.first_name as doctor_first_name,
                             d.last_name as doctor_last_name,
                             rad.first_name as radiologist_first_name,
                             rad.last_name as radiologist_last_name ";

        $userClass = Auth::user()->class;
        // add family doctor attributes if needed
        if($userClass == "d")
            $statement .= ", family_doctor.doctor_id as fam_doctor ";

        // get the scores returned by the fulltext search
        if($query != "" && $sorting == "relevance")
            $statement .= ", match(p.first_name,p.last_name)
                             against ('{$query}' in boolean mode) as patient_score,
                             match(r.description)
                             against ('{$query}' in boolean mode) as description_score,
                             match(r.diagnosis)
                             against ('{$query}' in boolean mode) as diagnosis_score ";

        // join records with people involved
        $statement .= "from oralism.radiology_record r, oralism.persons p,
                       oralism.persons d, oralism.persons rad";

        // add family doctor table if needed
        if($userClass == "d")
            $statement .= ", oralism.family_doctor family_doctor ";

        // conditions
        $statement .= " where r.patient_id = p.person_id
                        and r.doctor_id = d.person_id
                        and r.radiologist_id = rad.person_id";

        // security measures
        $personID = Auth::user()->person_id;
        // patient can only view their records
        if($userClass == "p")
            $statement .= " and r.patient_id = {$personID}";
        // doctor can only view their patients records
        else if($userClass == "d")
            $statement .= " and family_doctor.patient_id = r.patient_id
                            and family_doctor.doctor_id = {$personID}";
        // radiologist can only view records they conducted
        else if($userClass == "r")
            $statement .= " and r.radiologist_id = {$personID}";

        // match the records against search terms
        if($query != "")
            $statement .= " and (match(p.first_name,p.last_name)
                                 against ('{$query}' in boolean mode)
                                 or
                                 match(r.description,r.diagnosis)
                                 against ('{$query}' in boolean mode))";

        // filter based on test date
        if($startDate != "")
            $statement .= " and r.test_date >= '{$startDate}'";
        if($endDate != "")
            $statement .= " and r.test_date <= '{$endDate}'";

        // sort based on preference
        if($query && $sorting == "relevance")
            $statement .= " order by (6*patient_score + 3*diagnosis_score + description_score) desc";
        else if($sorting == "recent_first")
            $statement .= " order by test_date desc";
        else if($sorting == "recent_last")
            $statement .= " order by test_date asc";

        // get the matching records and return the view
        $records = DB::select($statement);

        // attach the images to each record
        foreach($records as $record)
        {
            $record->images = DB::select("select * from pacs_images where record_id = {$record->record_id}");
        }

        return View::make("search/results", array('records' => $records));
    }
}
