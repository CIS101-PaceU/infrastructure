# modifying tables in DB:

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
