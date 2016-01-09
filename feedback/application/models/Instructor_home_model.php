<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor_home_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCourses($tid) {
        $this->db->distinct("course_id, semester_id");
        $this->db->from("semester_course_instructor");
        $this->db->where("teacher_id", $tid);
        $this->db->order_by("semester_id, course_id");
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function getFeedbackSummeryForCourse($tid, $cid, $semid) {
        $query=$this->db->query("SELECT xx.question, yy.course_id, yy.count4, yy.count3, yy.count2, yy.count1, yy.count0 FROM questiions_for_course xx,
((SELECT '1' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count4 FROM feedbacks_for_course WHERE value_1='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count3 FROM feedbacks_for_course WHERE value_1='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count2 FROM feedbacks_for_course WHERE value_1='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count1 FROM feedbacks_for_course WHERE value_1='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count0 FROM feedbacks_for_course WHERE value_1='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '2' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count4 FROM feedbacks_for_course WHERE value_2='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count3 FROM feedbacks_for_course WHERE value_2='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count2 FROM feedbacks_for_course WHERE value_2='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count1 FROM feedbacks_for_course WHERE value_2='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count0 FROM feedbacks_for_course WHERE value_2='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '3' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count4 FROM feedbacks_for_course WHERE value_3='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count3 FROM feedbacks_for_course WHERE value_3='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count2 FROM feedbacks_for_course WHERE value_3='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count1 FROM feedbacks_for_course WHERE value_3='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count0 FROM feedbacks_for_course WHERE value_3='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '4' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count4 FROM feedbacks_for_course WHERE value_4='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count3 FROM feedbacks_for_course WHERE value_4='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count2 FROM feedbacks_for_course WHERE value_4='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count1 FROM feedbacks_for_course WHERE value_4='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count0 FROM feedbacks_for_course WHERE value_4='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '5' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count4 FROM feedbacks_for_course WHERE value_5='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count3 FROM feedbacks_for_course WHERE value_5='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count2 FROM feedbacks_for_course WHERE value_5='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count1 FROM feedbacks_for_course WHERE value_5='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count0 FROM feedbacks_for_course WHERE value_5='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '6' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count4 FROM feedbacks_for_course WHERE value_6='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count3 FROM feedbacks_for_course WHERE value_6='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count2 FROM feedbacks_for_course WHERE value_6='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count1 FROM feedbacks_for_course WHERE value_6='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count0 FROM feedbacks_for_course WHERE value_6='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '7' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count4 FROM feedbacks_for_course WHERE value_7='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count3 FROM feedbacks_for_course WHERE value_7='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count2 FROM feedbacks_for_course WHERE value_7='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count1 FROM feedbacks_for_course WHERE value_7='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count0 FROM feedbacks_for_course WHERE value_7='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '8' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_course WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_course WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_course WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_course WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_course WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '9' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count4 FROM feedbacks_for_course WHERE value_9='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count3 FROM feedbacks_for_course WHERE value_9='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count2 FROM feedbacks_for_course WHERE value_9='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count1 FROM feedbacks_for_course WHERE value_9='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count0 FROM feedbacks_for_course WHERE value_9='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)) yy
WHERE xx.id=yy.qid");
        return $result = $query->result();
    }

    public function getFeedbackSummeryForTeacher($tid, $cid, $semid) {
        $query=$this->db->query("
SELECT xx.question, yy.course_id, yy.count4, yy.count3, yy.count2, yy.count1, yy.count0 FROM questiions_for_instructor xx,
((SELECT '1' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count4 FROM feedbacks_for_instructor WHERE value_1='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count3 FROM feedbacks_for_instructor WHERE value_1='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count2 FROM feedbacks_for_instructor WHERE value_1='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count1 FROM feedbacks_for_instructor WHERE value_1='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_1) AS count0 FROM feedbacks_for_instructor WHERE value_1='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '2' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count4 FROM feedbacks_for_instructor WHERE value_2='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count3 FROM feedbacks_for_instructor WHERE value_2='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count2 FROM feedbacks_for_instructor WHERE value_2='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count1 FROM feedbacks_for_instructor WHERE value_2='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_2) AS count0 FROM feedbacks_for_instructor WHERE value_2='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '3' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count4 FROM feedbacks_for_instructor WHERE value_3='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count3 FROM feedbacks_for_instructor WHERE value_3='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count2 FROM feedbacks_for_instructor WHERE value_3='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count1 FROM feedbacks_for_instructor WHERE value_3='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_3) AS count0 FROM feedbacks_for_instructor WHERE value_3='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '4' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count4 FROM feedbacks_for_instructor WHERE value_4='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count3 FROM feedbacks_for_instructor WHERE value_4='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count2 FROM feedbacks_for_instructor WHERE value_4='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count1 FROM feedbacks_for_instructor WHERE value_4='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_4) AS count0 FROM feedbacks_for_instructor WHERE value_4='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '5' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count4 FROM feedbacks_for_instructor WHERE value_5='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count3 FROM feedbacks_for_instructor WHERE value_5='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count2 FROM feedbacks_for_instructor WHERE value_5='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count1 FROM feedbacks_for_instructor WHERE value_5='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_5) AS count0 FROM feedbacks_for_instructor WHERE value_5='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '6' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count4 FROM feedbacks_for_instructor WHERE value_6='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count3 FROM feedbacks_for_instructor WHERE value_6='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count2 FROM feedbacks_for_instructor WHERE value_6='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count1 FROM feedbacks_for_instructor WHERE value_6='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_6) AS count0 FROM feedbacks_for_instructor WHERE value_6='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '7' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count4 FROM feedbacks_for_instructor WHERE value_7='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count3 FROM feedbacks_for_instructor WHERE value_7='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count2 FROM feedbacks_for_instructor WHERE value_7='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count1 FROM feedbacks_for_instructor WHERE value_7='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_7) AS count0 FROM feedbacks_for_instructor WHERE value_7='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '8' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_instructor WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_instructor WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_instructor WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_instructor WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_instructor WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '9' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_instructor WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_instructor WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_instructor WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_instructor WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_instructor WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '10' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_instructor WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_instructor WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_instructor WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_instructor WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_instructor WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '11' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_instructor WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_instructor WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_instructor WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_instructor WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_instructor WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '12' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_instructor WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_instructor WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_instructor WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_instructor WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_instructor WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '13' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_instructor WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_instructor WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_instructor WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_instructor WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_instructor WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '14' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count4 FROM feedbacks_for_instructor WHERE value_8='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count3 FROM feedbacks_for_instructor WHERE value_8='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count2 FROM feedbacks_for_instructor WHERE value_8='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count1 FROM feedbacks_for_instructor WHERE value_8='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_8) AS count0 FROM feedbacks_for_instructor WHERE value_8='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)
UNION ALL
(SELECT '15' AS 'qid', A.course_id, A.count4, B.count3, C.count2, D.count1, E.count0 FROM
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count4 FROM feedbacks_for_instructor WHERE value_9='4'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') A,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count3 FROM feedbacks_for_instructor WHERE value_9='3'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') B,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count2 FROM feedbacks_for_instructor WHERE value_9='2'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') C,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count1 FROM feedbacks_for_instructor WHERE value_9='1'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') D,
(SELECT CASE WHEN (course_id IS NULL) THEN '".$cid."' ELSE course_id END AS course_id, COUNT(value_9) AS count0 FROM feedbacks_for_instructor WHERE value_9='0'  AND course_id='".$cid."' AND instructor='".$tid."' AND semester_id='".$semid."') E
WHERE A.course_id=B.course_id
AND A.course_id=C.course_id
AND A.course_id=D.course_id
AND A.course_id=E.course_id)) yy
WHERE xx.id=yy.qid");
        return $result = $query->result();
    }
    public function getCommentForCourse($tid, $cid, $semid) {
        $this->db->select("comments");
        $this->db->from("feedbacks_for_course");
        $this->db->where("instructor", $tid);
        $this->db->where("course_id", $cid);
        $this->db->where("semester_id", $semid);
        $this->db->order_by("id");
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function getCommentForInstructor($tid, $cid, $semid) {
        $this->db->select("comments");
        $this->db->from("feedbacks_for_instructor");
        $this->db->where("instructor", $tid);
        $this->db->where("course_id", $cid);
        $this->db->where("semester_id", $semid);
        $this->db->order_by("id");
        $query = $this->db->get();
        return $result = $query->result();
    }


    function __destruct() {
        $this->db->close();
    }

}