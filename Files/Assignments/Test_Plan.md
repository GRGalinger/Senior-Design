# Test Plan

### Part I. Description of Overall Test Plan
For our project, there are several main areas where we we be deploying our testing methods. The first deals with our PHP database functionality. In order to make sure the proper data is being sent to and recieved from our database we will run queries designed to check the structure of our schemas and tables, as well as check for data consistancy. In addition to this, we will be testing the general connection to our database making sure each user can successfully create an account and login to our application. 

The second deals with our file uploading processes. In order to check if a file has successfully been uploaded to our server, and then to our selected cloud servives, we will simply be sending in files of various sizes and checking the results. This will also allow us to check the functionality of our drag & drop upload system. The third area we will be testing is the encryption functionality. Ensureing the files we upload can properly be encrypted and decrypted we be the main focus of this testing portion.

The last portion of testing we will employ is testing our connection to cloud services through OAuth2.0 authorization.

### Test Case Descriptions
DB1.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Database Test 1**<br />
DB1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will ensure that connection to the database is functioning properly.<br />
DB1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will execute the mysqli connection function, which will try to connect to the PHPMyAdmin database.<br />
DB1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs for this test will be the server name, the database username and password, and the database name.<br />
DB1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The connection is succesful, otherwise error message and number is returned.<br />
DB1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
DB1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
DB1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
DB1.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test<br />
DB1.10   &nbsp;&nbsp;Connection to database was successful.<br />

DB2.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Database Test 2**<br />
DB2.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the user account creation.<br />
DB2.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will use the sign up functions to create test accounts. Then, these accounts will try to be logged in using the login functions.<br />
DB2.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be the user information for creating an account, which are name, email, username, and password.<br />
DB2.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The users data will be returned from the database upon succesfully creating and account and logging in.<br /> 
DB2.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
DB2.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
DB2.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
DB2.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test<br />
DB2.10   &nbsp;&nbsp;Account creation was successful.<br />

DB3.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Database Test 3**<br />
DB3.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test database table consistency when a users deletes their account.<br />
DB3.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will simulate a user deleting their account to see if their data across all database tables is also deleted.<br />
DB3.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be a delete account query.<br />
DB3.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be an remaining user data found.<br />
DB3.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
DB3.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
DB3.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
DB3.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test<br />
DB3.10   &nbsp;&nbsp;User account successfully deleted by query.<br />

OA1.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**OAuth2.0 Test 1**<br />
OA1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the authorization process through Google Drives API.<br />
OA1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the authorization process of a user connecting to our Google Drive app in order to upload files.<br />
OA1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be access tokens and client identification information.<br />
OA1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be user information obtained through the cloud service after authorization has occured.<br />
OA1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
OA1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
OA1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
OA1.9   &nbsp;&nbsp;&nbsp;&nbsp;Integration<br />
OA1.10   &nbsp;&nbsp;User account successfully authorized.<br />

OA2.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**OAuth2.0 Test 2**<br />
OA2.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the authorization process through Dropbox API.<br />
OA2.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the authorization process of a user connecting to our Dropbox app in order to upload files.<br />
OA2.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be access tokens and client identification information.<br />
OA2.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be user information obtained through the cloud service after authorization has occured.<br />
OA2.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
OA2.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
OA2.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
OA2.9   &nbsp;&nbsp;&nbsp;&nbsp;Integration<br />
OA2.10   &nbsp;&nbsp;User account successfully authorized.<br />

OA3.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**OAuth2.0 Test 3**<br />
OA3.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the authorization process through OneDrive API.<br />
OA3.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the authorization process of a user connecting to our OneDrive app in order to upload files.<br />
OA3.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs will be access tokens and client identification information.<br />
OA3.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be user information obtained through the cloud service after authorization has occured.<br />
OA3.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
OA3.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
OA3.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
OA3.9   &nbsp;&nbsp;&nbsp;&nbsp;Integration<br />
OA3.10   &nbsp;&nbsp;User account successfully authorized.<br />

FP1.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**File Proccessing Test 1**<br />
FP1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the functionality of the drop and drop file uploading system.<br />
FP1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will go through the file uploading procedure ensuring the files do make it to their end destination, as well as appear on screen within the application.<br />
FP1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs for this test will be the test files.<br />
FP1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be an error or success messages.<br />
FP1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
FP1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
FP1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
FP1.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test<br />
FP1.10   &nbsp;&nbsp;Files uploaded successfully.<br />

E1.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Encryption Test 1**<br />
E1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the functionality of the encryption feature for files.<br />
E1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will ensure files are encrypted correctly for different file types.<br />
E1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs for this test will be the different test files.<br />
E1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be an error or success messages.<br />
E1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
E1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
E1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
E1.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test<br />
E1.10   &nbsp;&nbsp;Files encrypted successfully.<br />

D1.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Decryption Test 1**<br />
D1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the functionality of the decryption feature for files.<br />
D1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will ensure messages are decrypted correctly.<br />
D1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs for this test will be the different encypted test files.<br />
D1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be an error or success messages.<br />
D1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
D1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
D1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
D1.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test<br />
D1.10   &nbsp;&nbsp;Files encrypted successfully.<br />

E2.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Encryption Test 2**<br />
E2.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test the functionality of end to end encryption for test files.<br />
E2.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will ensure end to end encryption from point of encryption to point of decryption.<br />
E2.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: The inputs for this test will be the different test files.<br />
E2.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: The outputs will be an error or success messages for each point in the file encryption to decryption path.<br />
E2.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
E2.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
E2.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
E2.9   &nbsp;&nbsp;&nbsp;&nbsp;Unit Test<br />
E2.10   &nbsp;&nbsp;Files encrypted successfully.<br />

UX1.1   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**Compatibility Test 1**<br />
UX1.2   &nbsp;&nbsp;&nbsp;&nbsp;This test will test will ensure that the webapp appears and functions properly across all the major web browsers.<br />
UX1.3   &nbsp;&nbsp;&nbsp;&nbsp;This test will involve visiting the webapp in multiple browsers and performing the major functions to ensure consistency between them.<br />
UX1.4   &nbsp;&nbsp;&nbsp;&nbsp;Inputs: Various application inputs<br />
UX1.5   &nbsp;&nbsp;&nbsp;&nbsp;Outputs: Various application outputs<br />
UX1.6   &nbsp;&nbsp;&nbsp;&nbsp;Normal<br />
UX1.7   &nbsp;&nbsp;&nbsp;&nbsp;Blackbox<br />
UX1.8   &nbsp;&nbsp;&nbsp;&nbsp;Functional<br />
UX1.9   &nbsp;&nbsp;&nbsp;&nbsp;Integration<br />
UX1.10   &nbsp;&nbsp;Application appears and functions consistently.<br />



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
| E1      | Normal          | Blackbox          | Functional             | Unit             |
| D1      | Normal          | Blackbox          | Functional             | Unit             |
| E2      | Normal          | Blackbox          | Functional             | Unit             |
| UX1     | Normal          | Blackbox          | Functional             | Integration      |
