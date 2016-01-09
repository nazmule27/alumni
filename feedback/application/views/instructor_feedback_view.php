<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
$CI = &get_instance();
$semester_name = $CI->session->userdata('semester_id');
?>
<div class="container paddingT75">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Instructor Feedback</h3>
            <br>
            <form role="form" method="post" action="<?=base_url();?>instructor_feedback/insertFeedbackInstructor">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="course_id">Course ID:</label>
                        <input type="text" class="form-control" name="course_id" value="<?php echo $this->input->get('cid'); ?>"  readonly required>
                    </div>
                    <div class="form-group">
                        <label for="course_name">Course Name:</label>
                        <input type="text" class="form-control width300" name="course_name"  value="<?php echo $course_name[0]->course_name;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="instructor">Instructor:</label>
                        <?php
                        $options=$instructor;
                        $tid=$this->input->get('tid');
                        $options = array('' => 'Select One') + $options;
                        echo form_dropdown('instructor', $options, $selected=$tid, 'class="form-control custom-text"');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="w_spent_time_hour">Weekly Spent Hour:</label>
                        <input type="text" class="form-control wid30" name="w_spent_time_hour" pattern="^[0-9]+\d?" placeholder="in hour" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="level">Level:</label>
                        <select name="level" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="1">Level 1</option>
                            <option value="2">Level 2</option>
                            <option value="3">Level 3</option>
                            <option value="4">Level 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="term">Term:</label>
                        <select name="term" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="1">Term 1</option>
                            <option value="2">Term 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester_name">Semester:</label>
                        <?php
                        $sem_options=$semesters;
                        $sem_options = array('' => 'Select One') + $sem_options;
                        $semester_id=$semester_name;
                        echo form_dropdown('semester_name', $sem_options, $selected=$semester_id, 'class="form-control custom-text"');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="expected_grade">Expected Grade:</label>
                        <select name="expected_grade" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="A+">A+</option>
                            <option value="A">A</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B">B</option>
                            <option value="B-">B-</option>
                            <option value="C+">C+</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room_no">Room No:</label>
                        <input type="text" class="form-control" name="room_no" maxlength="3" pattern="^[1-9]+\d{2}">
                    </div>
                    <br><br>

                </div>
                <i class="fair">[Please give your honest and constructive opinions for helping us to improve. Your opinions will be used solely for our continuous improvement.]</i>
                <br>
                <br>

                <table class="table feedback-table">
                    <thead>
                        <tr>
                            <th>Focus</th>
                            <th>SL</th>
                            <th width="1500">Statement for Evaluation</th>
                            <th>Strongly Agree</th>
                            <th>Partially Agree</th>
                            <th>Uncertain</th>
                            <th>Disagree</th>
                            <th>Strongly Disagree</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5"><p class="deg90 deginst">Lecture Organization and Teaching Methodology</p></td>
                            <td>1</td>
                            <td class="tLeft">The course objectives were satisfactorily achieved</td>
                            <td><input type="radio" value="4" name="question_1" required></td>
                            <td><input type="radio" value="3" name="question_1"></td>
                            <td><input type="radio" value="2" name="question_1"></td>
                            <td><input type="radio" value="1" name="question_1"></td>
                            <td><input type="radio" value="0" name="question_1"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>The instructor(s) encouraged me to participate in the class</td>
                            <td><input type="radio" value="4" name="question_2" required></td>
                            <td><input type="radio" value="3" name="question_2"></td>
                            <td><input type="radio" value="2" name="question_2"></td>
                            <td><input type="radio" value="1" name="question_2"></td>
                            <td><input type="radio" value="0" name="question_2"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>The instructor(s) completed the syllabus, made me interested in the subject, and encouraged me to study more</td>
                            <td><input type="radio" value="4" name="question_3" required></td>
                            <td><input type="radio" value="3" name="question_3"></td>
                            <td><input type="radio" value="2" name="question_3"></td>
                            <td><input type="radio" value="1" name="question_3"></td>
                            <td><input type="radio" value="0" name="question_3"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td class="tLeft">The instructor(s) was(were prompt in declaring class tests and results)</td>
                            <td><input type="radio" value="4" name="question_4" required></td>
                            <td><input type="radio" value="3" name="question_4"></td>
                            <td><input type="radio" value="2" name="question_4"></td>
                            <td><input type="radio" value="1" name="question_4"></td>
                            <td><input type="radio" value="0" name="question_4"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Overall class management was satisfactory</td>
                            <td><input type="radio" value="4" name="question_5" required></td>
                            <td><input type="radio" value="3" name="question_5"></td>
                            <td><input type="radio" value="2" name="question_5"></td>
                            <td><input type="radio" value="1" name="question_5"></td>
                            <td><input type="radio" value="0" name="question_5"></td>
                        </tr>
                        <tr>
                            <td  rowspan="6"><p class="deg90 deginst">Quality of Delivery</p></td>
                            <td>6</td>
                            <td class="tLeft">The instructor(s) wase(were) well-prepared for the classes</td>
                            <td><input type="radio" value="4" name="question_6" required></td>
                            <td><input type="radio" value="3" name="question_6"></td>
                            <td><input type="radio" value="2" name="question_6"></td>
                            <td><input type="radio" value="1" name="question_6"></td>
                            <td><input type="radio" value="0" name="question_6"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td class="tLeft">Pace of the instruction was even, justified, and easy to be coped up</td>
                            <td><input type="radio" value="4" name="question_7" required></td>
                            <td><input type="radio" value="3" name="question_7"></td>
                            <td><input type="radio" value="2" name="question_7"></td>
                            <td><input type="radio" value="1" name="question_7"></td>
                            <td><input type="radio" value="0" name="question_7"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>The instructor(s) was(were) clear enough to hear and follow during the instruction</td>
                            <td><input type="radio" value="4" name="question_8" required></td>
                            <td><input type="radio" value="3" name="question_8"></td>
                            <td><input type="radio" value="2" name="question_8"></td>
                            <td><input type="radio" value="1" name="question_8"></td>
                            <td><input type="radio" value="0" name="question_8"></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Concepts, ideas, and points where illustrated with examples, applications, and analogies</td>
                            <td><input type="radio" value="4" name="question_9" required></td>
                            <td><input type="radio" value="3" name="question_9"></td>
                            <td><input type="radio" value="2" name="question_9"></td>
                            <td><input type="radio" value="1" name="question_9"></td>
                            <td><input type="radio" value="0" name="question_9"></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Presentation of the course materials stimulated my interest for critical thinking in the subject area</td>
                            <td><input type="radio" value="4" name="question_10" required></td>
                            <td><input type="radio" value="3" name="question_10"></td>
                            <td><input type="radio" value="2" name="question_10"></td>
                            <td><input type="radio" value="1" name="question_10"></td>
                            <td><input type="radio" value="0" name="question_10"></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>My attention or interest was sustained during the lectures</td>
                            <td><input type="radio" value="4" name="question_11" required></td>
                            <td><input type="radio" value="3" name="question_11"></td>
                            <td><input type="radio" value="2" name="question_11"></td>
                            <td><input type="radio" value="1" name="question_11"></td>
                            <td><input type="radio" value="0" name="question_11"></td>
                        </tr>
                        <tr>
                            <td rowspan="4"><p class="deg90 deginst">Additional Questions</p></td>
                            <td>12</td>
                            <td class="tLeft">The instructors(s) was(were) responsive to students' need and problems either during or outside lectures</td>
                            <td><input type="radio" value="4" name="question_12" required></td>
                            <td><input type="radio" value="3" name="question_12"></td>
                            <td><input type="radio" value="2" name="question_12"></td>
                            <td><input type="radio" value="1" name="question_12"></td>
                            <td><input type="radio" value="0" name="question_12"></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>The lecture demonstrated importance of the subject</td>
                            <td><input type="radio" value="4" name="question_13" required></td>
                            <td><input type="radio" value="3" name="question_13"></td>
                            <td><input type="radio" value="2" name="question_13"></td>
                            <td><input type="radio" value="1" name="question_13"></td>
                            <td><input type="radio" value="0" name="question_13"></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Evaluation of the instructor(s) was fair and unbaised</td>
                            <td><input type="radio" value="4" name="question_14" required></td>
                            <td><input type="radio" value="3" name="question_14"></td>
                            <td><input type="radio" value="2" name="question_14"></td>
                            <td><input type="radio" value="1" name="question_14"></td>
                            <td><input type="radio" value="0" name="question_14"></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>The overall environment encouraged collaborative learning and development</td>
                            <td><input type="radio" value="4" name="question_15" required></td>
                            <td><input type="radio" value="3" name="question_15"></td>
                            <td><input type="radio" value="2" name="question_15"></td>
                            <td><input type="radio" value="1" name="question_15"></td>
                            <td><input type="radio" value="0" name="question_15"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <label for="comments">Comments (if any):</label>
                    <textarea class="form-control"  name="comments" placeholder="Comments" maxlength="255"></textarea>

                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
    <?php if (isset($success_msg)) { echo $success_msg; } ?>
</div>
<!-- /news -->

<?php
$this->load->view('common/footer');
?>
