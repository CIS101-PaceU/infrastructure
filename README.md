# modifying tables in DB v3:

**user table**
- needs password column, perhaps delete password table -- why was it separate?
- added role column to user table
**announcements table**
- announcement id should be auto-increment

**Course table**
- added userID column after courseID (to show which class belongs to which teacher... is there a better way to do this?)

**Announcement Table:**
- announcementID --> int, autoIncrement
- roleID
- datePosted --> varchar
- announcementTitle
- message --> longtext(21,844)
- CRN --> int(10), join with CRN from Course
- changed assignmentDescription to mediumtext 20,000

**Assignment Table**
- assignmentID --> int, auto increment
- courseID
- assignmentTitle
- assignmentDescription --> longText(21,844)

question --> shouldn't submissionNo and gradeAttempt be in Submissions Table?
