<!-- TO MOVE FAILED COURSES TO THE NEXT SESSION -->
INSERT INTO registered_courses (program_id, session, level, semester, student_id, course_id)
SELECT program_id,
       CASE
           WHEN session = '16' THEN '17'
           ELSE session
       END,
       CASE
           WHEN level = '300' THEN '400'
           WHEN level = '200' THEN '300'
           WHEN level = '100' THEN '200'
           ELSE level
       END,
       semester,
       student_id,
       course_id
FROM registered_courses
WHERE session = '16' AND grade_status = 'fail' AND status = 'published';

<!-- TO PROMOTE STUDENT LEVEL  -->
UPDATE `student_academics` SET `level` = '1000' WHERE `student_academics`.`level` = 400;
UPDATE `student_academics` SET `level` = '400' WHERE `student_academics`.`level` = 300
UPDATE `student_academics` SET `level` = '300' WHERE `student_academics`.`level` = 200
UPDATE `student_academics` SET `level` = '200' WHERE `student_academics`.`level` = 100

<!-- TO SET STUDENT LEVEL ON registered_courses -->
UPDATE `registered_courses` SET `level` = 'LEVEL' WHERE `registered_courses`.`student_id` = STUDENT_ID AND `session` = SESSION_ID

<!-- TO MERGE TWO(2) SEMILAR COURSES -->
UPDATE `registered_coursestest` SET `course_id` = '4007' WHERE `registered_coursestest`.`course_id` = 1495 AND `program_id` = 6 AND `session` =16

<!-- TO DELETE MUILTIPLE COURSE FOR SEMSTER REMARK  -->
DELETE sr1
FROM semester_remark_courses sr1
INNER JOIN (
    SELECT student_id, course_id, MIN(id) AS min_id
    FROM semester_remark_courses
    GROUP BY student_id, course_id
    HAVING COUNT(*) > 1
) sr2 ON sr1.student_id = sr2.student_id AND sr1.course_id = sr2.course_id AND sr1.id > sr2.min_id

<!-- TO INSERT FAILED COURSES INTO SEMSTER REMARK COURSES -->
INSERT INTO semester_remark_courses (registered_course_id, course_id, student_id, created_at, updated_at)
SELECT DISTINCT rc.id, rc.course_id, rc.student_id, NOW(), NOW()
FROM registered_courses rc
WHERE rc.grade_status = 'fail'
  AND NOT EXISTS (
    SELECT 1
    FROM semester_remark_courses src
    WHERE src.course_id = rc.course_id
      AND src.student_id = rc.student_id
)

<!-- TO ENABLE STUDENT SEE THERE RESULT IF IT HAS BEEN APPROVE BUT NOT PUBLISHED -->
UPDATE `registered_courses` SET `status` = 'published'
WHERE `program_id` = 34
AND `session` LIKE '16'
AND `level` LIKE '100'
AND `semester` LIKE '2'
AND `status` = 'unpublished'
