** Analyse AWS S3 bucket files using AWS Textract :**


- Create a node project and copy the index.js file .
- install the following dependencies :
     
    1. "dayjs": "^1.9.3",
    2. "fs": "0.0.1-security"
  


- Make sure that AWS CLI is configured with the right access and secret key .

- _getFiles.sh_ is a simple shell script that allows to download certain docs from S3 bucket .

An example of file IDs is :
99d38b67-9cc9-4e61-8b37-6b56bb0523bb.jpg
b6c4ecf1-f1ed-4ad5-9072-e9d6c8bb0fe5.jpg
c8b699d2-b6e7-4476-88f0-04c65a979eb5.jpg
76887036-30cc-470e-9acc-98a4a75d0b1f.jpg


- Run the following command to get words detected by AWS Textract : 

1. Student case :
aws textract detect-document-text --document '{"S3Object":{"Bucket":"aircampus","Name":"student-doc/[docID]"}}' | grep "Text" > result.txt

2. Other user case :
aws textract detect-document-text --document '{"S3Object":{"Bucket":"aircampus","Name":"official-doc/[docID]"}}' | grep "Text" > result.txt

It returns all words detected by AWS Textractin the file :  _result.txt_

_index.js_ execute some tests to verify if a user is valid or not valid .

1. Test 1 ==> Matching current year 
1. Test 2 ==> Matching Student Identifier
1. Test 3 ==> Matching Birth Date
1. Test 4 ==> Matching Names


- Before running the script do not forget to complete the data form  : _(L50)_
const firstName = "";
const lastName = "";
const birthDate = "yyyy-mm-dd";
const studenType = "" ; 


- To run script tap :
node index.js

