User Documentation
=====================

Login Module
------------

To get to the login page you can press the Log in button on the navigation bar.

#### Logging in

To login first proceed to the login page by pressing the Log in button on the
navigation bar. Then enter your username and password in the text boxes
labelled UserName and Password respectively. Clicking the button labelled LOGIN
will log you in if the given login credentials are correct.

#### Invalid login credentials

If the login credentials provided are incorrect then you will be taken
back to the login page and there will be a message displaying that
the provided login credentials were invalid.

#### Logging out

To logout you can click the Log out <username> button on the navigation bar.
This will log you out, and take you back to the home screen.

User Management Module
----------------------

The User Management Module allows administrators to add new users, and
modify existing users. This page is accessible only while logged in
as an administrator. It can be accessed by clicking on the
"User Management" button on the navigation bar.

#### Adding new users

A new user can be added to the system by clicking the "NEW USER" button
on the User Management page. Clicking this button will take you to a new
page where the new users information can be entered.

The new user page requires a first name, last name, address, email,
phone number, username, password, and class. All fields are required. 
The email must be in the form <user>@<domain>.<extension>. The phone
number must be 10 digits long (e.g. 123-456-7890).

Clicking the "SAVE" button will create the new user with a login
with the given username, password and class. After this, new logins
can be created using the method described below.

Clicking the "CANCEL" button will not create a new user, and will return to the
User Management screen.

#### Creating new logins

Users can have multiple logins. In order to add a new login to a user,
a user must first be created using the above method.

To add a new login to a user, first find the user on the User Management page.
Then click the "NEW LOGIN" button beside that users name. This will take
you to a new page. On the new page you must enter the new username, password,
and select the class of the new login. All of the users old logins will still
remain, upon the creation of the new login. To create the new login, click the
"SAVE" button. To cancel the new login, click the "CANCEL" button.

#### Editing a user

A user can be edited by click on the "EDIT" button beside their name
in the table of users on the User Management page.

The edit user page can also be reached by clicking the "Edit Info" button
on the navigation bar. However, that will only allow you to modify the user
info of the user you are currently logged into.

On the edit user page, the name, address, email, and phone number of the
user can be modified. In addition the username, password, and class of
any of the users logins can be changed.

After making any changes to the user, the "SAVE" button must be clicked
for the changes to take affect.

#### Managing doctors

To manage doctors of a person, click the "MANAGE DOCTORS" button beside
that persons name on the User Management page. This will take you to a new
page where you can remove existing doctors, and add new doctors.

##### Adding new doctors to a person

Once on the Manage Doctors page. You can give the person a new family
doctor by selecting the doctor from the drop down list and clicking "SAVE".
This will add the doctor to the patient. Clicking "CANCEL" will take you back
to the User Management page.

##### Removing doctors from a person

If a person has family doctors, they can be removed from the Manage
Doctors page. To remove a family doctor, find the doctor in the table
of family doctors. Clicking the "REMOVE" button will remove the family
doctor from that person. The list of family doctors will only be visible
if the selected person have family doctors assigned to them.

Report Generating Module
------------------------

TODO

Uploading Module
----------------

TODO

Search Module
-------------

While performing searches there are two main pages. The first page
is the search page where a query is input. The second page is the
results page where the results of a search are displayed.

#### Making a search

To get to the search page, click the Search button on the navigation bar.
To make a query against existing records, type the query into the textbox
labelled search and click the button labelled SEARCH. This will take you to the
search results page (explained below).

#### Limiting a search based on dates

The query can be narrowed down by specifying the start and end date. If only
the start date is specified then all records matching the query after that date
will be displayed. If only the end date is specified then all records matching
the query before that date will be displayed. If both are specified then only
records matching the query that fall between those two dates will be displayed.

The dates selected are inclusive in the search results. Meaning that the
records displayed will be from the start date, inclusive, to the end date, also
inclusive.

It is possible to leave the query blank and only select dates. If this is
done then the search results will contain all records between the selected
dates, based on the description above.

#### Search result ordering

There are three different ways to order the results. These can be selected
from the radio buttons below the date entry.

The first method is by relevancy. If this button is selected then the results
will be displayed based on the relevancy of the record to the search query. If
the search query is left blank then the results have no guaranteed ordering.

The second and third method are most-recent-first, and most-recent-last. These
two methods order the results based on test date. The records with the most
recent and least recent test dates are displayed first respectively.

#### Viewing search results

Search results are displayed on a separate page after clicking the search
button on the search page. If the given query matches no records then the
text "No Results Found!" will be displayed. Otherwise a table of matching
records will be displayed. The table displays the patient, doctor,
radiologist, test type, prescribing date, test date, diagnosis, description,
and thumbnails.

#### Viewing record images

There are two ways to view record images from the search results page. The
first method is to click on the images thumbnail in the search results table.
This will open a new window containing the image. The two buttons can be used
to increase or decrease the size of the image.

The second method to view a records images is to click on the "View" button in
the same row as the record you want to view images for. This will take you to
the records page. At the bottom of this page is a list of images for the
record. Again the two buttons can be used to increase or decrease the size of
the image.

Data Analysis Module
--------------------

TODO

Installation Instructions
=========================

TODO