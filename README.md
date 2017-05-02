# modifying tables in DB v3:

**user table**
- needs password column, perhaps delete password table -- why was it separate?
- added role column to user table

**Course table**
- added userID column after courseID (to show which class belongs to which teacher... is it necessary to Join this table?)

**Announcement Table:**
- announcementID --> int, autoIncrement
- roleID
- datePosted --> varchar
- announcementTitle
- message --> longtext(21,844)
- CRN --> int(10), join with CRN from Course

**Assignment Table**
- assignmentID --> int, auto increment
- courseID
- assignmentTitle
- assignmentDescription --> longText(21,844)

question --> shouldn't submissionNo and gradeAttempt be in Submissions Table?
