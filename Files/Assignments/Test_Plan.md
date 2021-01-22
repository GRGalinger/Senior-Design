# Test Plan

### Part I. Description of Overall Test Plan
For our project, there are several main areas where we we be deploying our testing methods. The first deals with our PHP database functionality. In order to make sure the proper data is being sent to and recieved from our database we will run queries designed to check the structure of our schemas and tables, as well as check for data consistancy. In addition to this, we will be testing the general connection to our database making sure each user can successfully create an account and login to our application. 

The second deals with our file uploading processes. In order to check if a file has successfully been uploaded to our server, and then to our selected cloud servives, we will simply be sending in files of various sizes and checking the results. This will also allow us to check the functionality of our drag & drop upload system. The third area we will be testing is the encryption functionality. Ensureing the files we upload can properly be encrypted and decrypted we be the main focus of this testing portion.

The last portion of testing we will employ is testing our connection to cloud services through OAuth2.0 authorization.

### Test Case Descriptions
DB1.1   &nbsp;&nbsp;&nbsp;&nbsp;**Database Test 1**
DB1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will ensure that connection to the database is functioning properly.
DB1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will execute the mysqli connection function, which will try to connect to the PHPMyAdmin database.
DB1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs for this test will be the server name, the database username and password, and the database name.
DB1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The connection is succesful, otherwise error message and number is returned.
DB1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal
DB1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox
DB1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional
DB1.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test
DB1.10   &nbsp;&nbsp;Connection to database was successful

DB2.1   &nbsp;&nbsp;&nbsp;&nbsp;**Database Test 2**
DB2.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the user account creation
DB2.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will use the sign up functions to create test accounts. Then, these accounts will try to be logged in using the login functions.
DB2.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be the user information for creating an account, which are name, email, username, and password.
DB2.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The users data will be returned from the database upon succesfully creating and account and logging in. 
DB2.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal
DB2.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox
DB2.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional
DB2.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test
DB2.10   &nbsp;&nbsp;Account creating was succesful

DB3.1   &nbsp;&nbsp;&nbsp;&nbsp;**Database Test 3**
DB3.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test database table consistancy when a users deletes their account
DB3.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will simulate a user deleting their account to see if their data across all database tables is also deleted
DB3.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be a delete account query
DB3.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be an remaining user data found
DB3.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal
DB3.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox
DB3.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional
DB3.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test
DB3.10   &nbsp;&nbsp;User account successfully deleted by query

OA1.1   &nbsp;&nbsp;&nbsp;&nbsp;**OAuth2.0 Test 1**
OA1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the authoirization process through Google Drives API
OA1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the authorization process of a user connecting to our Google Drive app in order to upload files
OA1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be access tokens and client identification information
OA1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be user information obtained through the cloud service after authorization has occured
OA1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal
OA1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox
OA1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional
OA1.9   &nbsp;&nbsp;&nbsp;&nbsp;Integration
OA1.10   &nbsp;&nbsp;User account successfully authorized

OA2.1   &nbsp;&nbsp;&nbsp;&nbsp;**OAuth2.0 Test 2**
OA2.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the authoirization process through Dropbox API
OA2.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the authorization process of a user connecting to our Dropbox app in order to upload files
OA2.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be access tokens and client identification information
OA2.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be user information obtained through the cloud service after authorization has occured
OA2.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal
OA2.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox
OA2.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional
OA2.9   &nbsp;&nbsp;&nbsp;&nbsp;Integration
OA2.10   &nbsp;&nbsp;User account successfully authorized

OA3.1   &nbsp;&nbsp;&nbsp;&nbsp;**OAuth2.0 Test 3**
OA3.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the authoirization process through OneDrive API
OA3.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the authorization process of a user connecting to our OneDrive app in order to upload files
OA3.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be access tokens and client identification information
OA3.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be user information obtained through the cloud service after authorization has occured
OA3.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal
OA3.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox
OA3.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional
OA3.9   &nbsp;&nbsp;&nbsp;&nbsp;Integration
OA3.10   &nbsp;&nbsp;User account successfully authorized

FP1.1   &nbsp;&nbsp;&nbsp;&nbsp;**File Proccessing Test 1**
FP1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the functionality of the drop and drop file uploading system
FP1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the file uploading procedure ensuring the files do make it to their end destination, as well as appear on screen within the application
FP1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs for this test will be the test files
FP1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be an error or success messages
FP1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal
FP1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox
FP1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional
FP1.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test
FP1.10   &nbsp;&nbsp;Files uploaded successfully




### Test Case Matrix
| Test ID | Normal/Abnormal | Blackbox/Whitebox | Functional/Performance | Unit/Integration |
|---------|-----------------|-------------------|------------------------|------------------|
| DB1     | Normal          | Blackbox          | Functional             | Unit             |
| DB2     | Normal          | Blackbox          | Functional             | Unit             |
| DB3     | Normal          | Blackbox          | Functional             | Unit             |
| AO1     | Normal          | Blackbox          | Funcitonal             | Integration      |
| AO2     | Normal          | Blackbox          | Funcitonal             | Integration      |
| AO3     | Normal          | Blackbox          | Funcitonal             | Integration      |
| FP1     | Normal          | Blackbox          | Functional             | Unit             |
|         |                 |                   |                        |                  |
|         |                 |                   |                        |                  |
|         |                 |                   |                        |                  |