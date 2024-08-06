 
<?php $__env->startSection('content'); ?>
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light"><?php echo e(env('APP_NAME')); ?> / 
        <?php echo e(trans('cruds.course.title_singular')); ?>

        <?php echo e(trans('global.list')); ?> /
    </span> 
    <?php echo e(trans('global.edit')); ?>

    <?php echo e(trans('cruds.course.title_singular')); ?>:
    <?php echo e(trans('cruds.course.fields.id')); ?>

    <?php echo e($course->id); ?>

</h4>  

<div class="row">
    <div class="col-lg-9">
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger mb-2" role="alert">
                    <?php echo e($error); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.courses.update', $course)); ?>" method="POST" class="pt-3" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2 <?php echo e($errors->has('title') ? 'invalid' : ''); ?>">
                        <label class="form-label required" for="title"><?php echo e(trans('cruds.course.fields.title')); ?></label>
                        <input class="form-control" type="text" name="title" id="title" required
                            value="<?php echo e($course->title); ?>">
                        <div class="validation-message">
                            <?php echo e($errors->first('title')); ?>

                        </div>
                        <div class="help-block">
                            <?php echo e(trans('cruds.course.fields.title_helper')); ?>

                        </div>
                    </div>
                    <div class="form-group mb-2 <?php echo e($errors->has('description') ? 'invalid' : ''); ?>">
                        <label class="form-label required"
                            for="description"><?php echo e(trans('cruds.course.fields.description')); ?></label>
                        <textarea class="form-control" name="description" id="description" required rows="4"><?php echo e($course->description); ?></textarea>
                        <div class="validation-message">
                            <?php echo e($errors->first('description')); ?>

                        </div>
                        <div class="help-block">
                            <?php echo e(trans('cruds.course.fields.description_helper')); ?>

                        </div>
                    </div>
                    <div class="marketopia-zone">
                        <input type="file" name="file" class="file-input">                        
                        <div class="dz-message">
                            Thumbnail
                            <span class="note">Drop files here or click to upload</span>
                        </div>
                        <div class="dz-images" id="dz-images"></div>
                    </div>   
                    <div class="form-group mb-2 <?php echo e($errors->has('course.price') ? 'invalid' : ''); ?>">
                        <label class="form-label" for="price"><?php echo e(trans('cruds.course.fields.price')); ?></label>
                        <input class="form-control" type="number" name="price" id="price"
                            value="<?php echo e($course->price); ?>" step="0.01">
                        <div class="validation-message">
                            <?php echo e($errors->first('course.price')); ?>

                        </div>
                        <div class="help-block">
                            <?php echo e(trans('cruds.course.fields.price_helper')); ?>

                        </div>
                    </div>
                    <div class="form-group mb-2 <?php echo e($errors->has('course.is_published') ? 'invalid' : ''); ?>">
                        <label class="switch">
                            <input type="checkbox" class="switch-input" name="is_published" <?php echo e($course->is_published == 1 ? 'checked' : ''); ?>>
                            <span class="switch-toggle-slider">
                                <span class="switch-on">
                                    <i class="ti ti-check"></i>
                                </span>
                                <span class="switch-off">
                                    <i class="ti ti-x"></i>
                                </span>
                            </span>
                            <span class="switch-label"><?php echo e(trans('cruds.course.fields.is_published')); ?></span>
                        </label>
                        <div class="validation-message">
                            <?php echo e($errors->first('course.is_published')); ?>

                        </div>
                    </div>
                </div> 
            </div>
            <br>
            <div class="form-group mb-4">
                <h3><?php echo e(trans('cruds.unit.title_singular')); ?> <?php echo e(trans('global.list')); ?></h3>
                <div id="units-wrapper">
                    <?php $__currentLoopData = $course->units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-2 unit-item">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="unit_title_<?php echo e($unit->id); ?>"><?php echo e(trans('cruds.unit.fields.title')); ?></label>
                                    <input class="form-control" type="text" name="units[old][<?php echo e($unit->id); ?>][title]" id="new_unit_title_<?php echo e($unit->id); ?>" value="<?php echo e($unit->name); ?>">
                                </div>
                                <div class="lessons-wrapper">
                                    <label><?php echo e(trans('cruds.lesson.title_singular')); ?> <?php echo e(trans('global.list')); ?></label>
                                    <?php $__currentLoopData = $unit->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="lesson-item mb-2">
                                        <div class="form-group">
                                                <label for="new_lesson_title_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>"><?php echo e(trans('cruds.lesson.fields.title')); ?></label>
                                                <input class="form-control" type="text" name="units[old][<?php echo e($unit->id); ?>][lessons][old][<?php echo e($lesson->id); ?>][title]" value="<?php echo e($lesson->title); ?>" id="new_lesson_title_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="new_lesson_content_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>"><?php echo e(trans('cruds.lesson.fields.content')); ?></label>
                                                <textarea class="form-control" name="units[old][<?php echo e($unit->id); ?>][lessons][old][<?php echo e($lesson->id); ?>][content]" id="new_lesson_content_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>" rows="3"><?php echo e($lesson->short_text); ?></textarea>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="new_lesson_thumb_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>"><?php echo e(trans('cruds.lesson.fields.thumbnail')); ?></label>
                                                <input type="file" name="units[old][<?php echo e($unit->id); ?>][lessons][old][<?php echo e($lesson->id); ?>][thumbnail]" class="form-control" id="new_lesson_thumb_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>">                        
                                                <?php $__currentLoopData = $course->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img src="<?php echo e($entry['thumbnail']); ?>" alt="<?php echo e($entry['name']); ?>" style="width:100px" title="<?php echo e($entry['name']); ?>" class="img-thumbnail mx-2">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="new_lesson_video_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>"><?php echo e(trans('cruds.lesson.fields.video')); ?></label>
                                                <input type="file" name="units[old][<?php echo e($unit->id); ?>][lessons][old][<?php echo e($lesson->id); ?>][video]" class="form-control" id="new_lesson_video_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>">                        
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="new_lesson_iframe_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>"><?php echo e(trans('cruds.lesson.fields.iframe')); ?></label>
                                                <textarea class="form-control" name="units[old][<?php echo e($unit->id); ?>][lessons][old][<?php echo e($lesson->id); ?>][iframe]" id="new_lesson_iframe_<?php echo e($unit->id); ?>_<?php echo e($lesson->id); ?>" rows="3"><?php echo e($lesson->iframe); ?></textarea>
                                            </div>
                                        <button type="button" class="btn btn-danger mt-2 remove-lesson"><?php echo e(trans('global.delete_lesson')); ?></button>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <button type="button" class="btn btn-primary add-lesson" data-unit-id="<?php echo e($unit->id); ?>"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.lesson.title_singular')); ?></button>
                                <button type="button" class="btn btn-danger remove-unit" data-unit-id="<?php echo e($unit->id); ?>"><?php echo e(trans('global.delete_unit')); ?></button>
                                <div class="quiz-wrapper mt-4">
                                    <h5><?php echo e(trans('cruds.quiz.title_singular')); ?></h5>
                                    <?php $__currentLoopData = $unit->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="quiz-item mb-2">
                                        <div class="form-group">
                                            <label for="new_quiz_title_<?php echo e($quiz->id); ?>"><?php echo e(trans('cruds.quiz.fields.title')); ?></label>
                                            <input class="form-control" type="text" name="units[old][<?php echo e($unit->id); ?>][quizzes][old][<?php echo e($quiz->id); ?>][title]" id="new_quiz_title_<?php echo e($quiz->id); ?>" value="<?php echo e($quiz->title); ?>">
                                        </div>
                                        <br>
                                        <div class="questions-wrapper">
                                            <h4><?php echo e(trans('cruds.quiz.fields.questions')); ?></h4>
                                            <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="question-item mb-2">
                                                <div class="form-group">
                                                    <label for="new_question_text_<?php echo e($unit->id); ?>_<?php echo e($quiz->id); ?>_<?php echo e($question->id); ?>"><?php echo e(trans('cruds.question.fields.text')); ?></label>
                                                    <textarea class="form-control" value="<?php echo e($question->name); ?>" name="units[old][<?php echo e($unit->id); ?>][quizzes][old][<?php echo e($quiz->id); ?>][questions][<?php echo e($question->id); ?>][text]" id="new_question_text_<?php echo e($unit->id); ?>_<?php echo e($quiz->id); ?>_<?php echo e($question->id); ?>" rows="3"><?php echo e($question->question_text); ?></textarea>
                                                </div>
                                                <div class="answers-wrapper">
                                                    <h6><?php echo e(trans('cruds.question.fields.answers')); ?></h6>
                                                    <?php $__currentLoopData = $question->choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="answer-item mb-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="width: 60px;">
                                                                <label class="switch switch-primary">
                                                                    <input type="checkbox" name="units[old][<?php echo e($unit->id); ?>][quizzes][old][<?php echo e($quiz->id); ?>][questions][<?php echo e($question->id); ?>][answers][<?php echo e($answer->id); ?>][correct]" <?php echo e($answer->is_correct ? 'checked' : ''); ?> class="switch-input">
                                                                    <span class="switch-toggle-slider">
                                                                        <span class="switch-on"><i class="ti ti-check"></i></span>
                                                                        <span class="switch-off"><i class="ti ti-x"></i></span>
                                                                    </span>
                                                                    <span class="switch-label"><?php echo e(trans('cruds.answer.fields.correct')); ?></span>
                                                                </label>
                                                            </span>
                                                            <input type="text" class="form-control" name="units[old][<?php echo e($unit->id); ?>][quizzes][old][<?php echo e($quiz->id); ?>][questions][<?php echo e($question->id); ?>][answers][<?php echo e($answer->id); ?>][text]" value="<?php echo e($answer->choice_text); ?>" placeholder="<?php echo e(trans('cruds.answer.fields.text')); ?>" aria-label="<?php echo e(trans('cruds.answer.fields.text')); ?>">
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <button type="button" class="btn btn-primary add-answer" data-unit-id="<?php echo e($unit->id); ?>" data-quiz-id="<?php echo e($quiz->id); ?>" data-question-id="<?php echo e($question->id); ?>"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.answer.title_singular')); ?></button>
                                                <button type="button" class="btn btn-danger remove-question"><?php echo e(trans('global.delete')); ?></button>
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <br>
                                        <button type="button" class="btn btn-primary add-question" data-unit-id="<?php echo e($unit->id); ?>" data-quiz-id="<?php echo e($quiz->id); ?>"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.question.title_singular')); ?></button>
                                        <button type="button" class="btn btn-danger mt-2 remove-quiz"><?php echo e(trans('global.delete')); ?></button>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </div>
                                <button type="button" class="btn btn-primary add-quiz" data-unit-id="<?php echo e($unit->id); ?>"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.quiz.title_singular')); ?></button>
                                
                            
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button type="button" class="btn btn-primary mt-4" id="add-unit"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.unit.title_singular')); ?></button>
            </div>
            
            
            <div class="form-group mb-2">
                <button class="btn btn-primary mr-2" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
                <a href="<?php echo e(route('admin.courses.index')); ?>" class="btn btn-secondary">
                    <?php echo e(trans('global.cancel')); ?>

                </a>
            </div>






















        </form>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <?php $__currentLoopData = $course->thumbnail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e($entry['url']); ?>" alt="<?php echo e($entry['name']); ?>" title="<?php echo e($entry['name']); ?>" class="w-100">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/vendor/libs/dropzone/dropzone.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('/')); ?>assets/vendor/libs/dropzone/dropzone.js"></script>
    <script src="<?php echo e(asset('assets/js/forms-file-upload.js')); ?>"></script>
    <script src="<?php echo e(asset('js/file-upload.js')); ?>"></script>
 <script>
    let unitCounter = <?php echo e($course->units->count()); ?>; // Initialize unitCounter based on existing units
    let quizCounter = 0; // Counter to track quiz IDs

    document.getElementById('add-unit').addEventListener('click', function() {
        const unitWrapper = document.getElementById('units-wrapper');
        const unitCount = unitCounter++;
        const newUnitHtml = `
            <div class="card mb-2 unit-item">
                <div class="card-body">
                    <!-- Unit Form Fields -->
                    <div class="form-group">
                        <label for="new_unit_title_${unitCount}"><?php echo e(trans('cruds.unit.fields.title')); ?></label>
                        <input class="form-control" type="text" name="units[new][${unitCount}][title]" id="new_unit_title_${unitCount}">
                    </div>
                    <div class="lessons-wrapper">
                        <label><?php echo e(trans('cruds.lesson.title_singular')); ?> <?php echo e(trans('global.list')); ?></label>
                    </div>
                    <button type="button" class="btn btn-primary add-lesson" data-unit-id="${unitCount}"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.lesson.title_singular')); ?></button>
                    
                    <!-- Quizzes Section -->
                    <div class="quiz-wrapper mt-4">
                        <h5><?php echo e(trans('cruds.quiz.title_singular')); ?></h5>
                    </div>
                    <button type="button" class="btn btn-primary add-quiz" data-unit-id="${unitCount}"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.quiz.title_singular')); ?></button>
                    
                    <button type="button" class="btn btn-danger remove-unit"><?php echo e(trans('global.delete')); ?></button>
                </div>
            </div>
        `;
        unitWrapper.insertAdjacentHTML('beforeend', newUnitHtml);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-unit')) {
            const unitItem = event.target.closest('.unit-item');
            unitItem.remove();
        } else if (event.target.classList.contains('add-lesson')) {
            const unitItem = event.target.closest('.unit-item');
            const lessonsWrapper = unitItem.querySelector('.lessons-wrapper');
            const lessonCount = lessonsWrapper.children.length;
            const unitId = event.target.getAttribute('data-unit-id');
            const newLessonHtml = `
                <div class="lesson-item mb-2">
                    <div class="form-group">
                            <label for="new_lesson_title_${unitId}_${lessonCount}"><?php echo e(trans('cruds.lesson.fields.title')); ?></label>
                            <input class="form-control" type="text" name="units[new][${unitId}][lessons][new][${lessonCount}][title]" id="new_lesson_title_${unitId}_${lessonCount}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_content_${unitId}_${lessonCount}"><?php echo e(trans('cruds.lesson.fields.content')); ?></label>
                            <textarea class="form-control" name="units[new][${unitId}][lessons][new][${lessonCount}][content]" id="new_lesson_content_${unitId}_${lessonCount}" rows="3"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_thumb_${unitId}_${lessonCount}"><?php echo e(trans('cruds.lesson.fields.thumbnail')); ?></label>
                            <input type="file" name="units[new][${unitId}][lessons][new][${lessonCount}][thumbnail]" class="form-control" id="new_lesson_thumb_${unitId}_${lessonCount}">                        
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_video_${unitId}_${lessonCount}"><?php echo e(trans('cruds.lesson.fields.video')); ?></label>
                            <input type="file" name="units[new][${unitId}][lessons][new][${lessonCount}][video]" class="form-control" id="new_lesson_video_${unitId}_${lessonCount}">                        
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_iframe_${unitId}_${lessonCount}"><?php echo e(trans('cruds.lesson.fields.iframe')); ?></label>
                            <textarea class="form-control" name="units[new][${unitId}][lessons][new][${lessonCount}][iframe]" id="new_lesson_iframe_${unitId}_${lessonCount}" rows="3"></textarea>
                        </div>
                    <button type="button" class="btn btn-danger mt-2 remove-lesson"><?php echo e(trans('global.delete')); ?></button>
                </div>
            `;
            lessonsWrapper.insertAdjacentHTML('beforeend', newLessonHtml);
        } else if (event.target.classList.contains('remove-lesson')) {
            const lessonItem = event.target.closest('.lesson-item');
            lessonItem.remove();
        } else if (event.target.classList.contains('add-quiz')) {
            const unitItem = event.target.closest('.unit-item');
            const quizzesWrapper = unitItem.querySelector('.quiz-wrapper');
            const unitId = event.target.getAttribute('data-unit-id');
            const newQuizHtml = `
                <div class="quiz-item mb-2">
                    <div class="form-group">
                        <label for="new_quiz_title_${quizCounter}"><?php echo e(trans('cruds.quiz.fields.title')); ?></label>
                        <input class="form-control" type="text" name="units[new][${unitId}][quizzes][new][${quizCounter}][title]" id="new_quiz_title_${quizCounter}">
                    </div>
                    <br>
                    <div class="questions-wrapper">
                        <h4><?php echo e(trans('cruds.quiz.fields.questions')); ?></h4>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary add-question" data-unit-id="${unitId}" data-quiz-id="${quizCounter}"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.question.title_singular')); ?></button>
                    <button type="button" class="btn btn-danger mt-2 remove-quiz"><?php echo e(trans('global.delete')); ?></button>
                </div>
            `;
            quizzesWrapper.insertAdjacentHTML('beforeend', newQuizHtml);
            quizCounter++;
        } else if (event.target.classList.contains('remove-quiz')) {
            const quizItem = event.target.closest('.quiz-item');
            quizItem.remove();
        } else if (event.target.classList.contains('add-question')) {
            const quizItem = event.target.closest('.quiz-item');
            const unitId = event.target.getAttribute('data-unit-id');
            const quizId = event.target.getAttribute('data-quiz-id');
            const questionsWrapper = quizItem.querySelector('.questions-wrapper');
            const questionCount = questionsWrapper.children.length;
            const newQuestionHtml = `
                <div class="question-item mb-2">
                    <div class="form-group">
                        <label for="new_question_text_${unitId}_${quizId}_${questionCount}"><?php echo e(trans('cruds.question.fields.text')); ?></label>
                        <textarea class="form-control" name="units[new][${unitId}][quizzes][new][${quizId}][questions][${questionCount}][text]" id="new_question_text_${unitId}_${quizId}_${questionCount}" rows="3"></textarea>
                    </div>
                    <div class="answers-wrapper">
                        <h6><?php echo e(trans('cruds.question.fields.answers')); ?></h6>
                    </div>
                    <button type="button" class="btn btn-primary add-answer" data-unit-id="${unitId}" data-quiz-id="${quizId}" data-question-id="${questionCount}"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.answer.title_singular')); ?></button>
                    <button type="button" class="btn btn-danger remove-question"><?php echo e(trans('global.delete')); ?></button>
                </div>
                <br>
                <hr>
                <br>
            `;
            questionsWrapper.insertAdjacentHTML('beforeend', newQuestionHtml);
        } else if (event.target.classList.contains('remove-question')) {
            const questionItem = event.target.closest('.question-item');
            questionItem.remove();
        } else if (event.target.classList.contains('add-answer')) {
            const questionItem = event.target.closest('.question-item');
            const unitId = event.target.getAttribute('data-unit-id');
            const quizId = event.target.getAttribute('data-quiz-id');
            const questionId = event.target.getAttribute('data-question-id');
            const answersWrapper = questionItem.querySelector('.answers-wrapper');
            const answerCount = answersWrapper.children.length;
            const newAnswerHtml = `
                <div class="answer-item mb-2">
                    <div class="input-group">
                        <span class="input-group-text" style="width: 60px;">
                            <label class="switch switch-primary">
                                <input type="checkbox" name="units[new][${unitId}][quizzes][new][${quizId}][questions][${questionId}][answers][${answerCount}][correct]" class="switch-input">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"><i class="ti ti-check"></i></span>
                                    <span class="switch-off"><i class="ti ti-x"></i></span>
                                </span>
                                <span class="switch-label"><?php echo e(trans('cruds.answer.fields.correct')); ?></span>
                            </label>
                        </span>
                        <input type="text" class="form-control" name="units[new][${unitId}][quizzes][new][${quizId}][questions][${questionId}][answers][${answerCount}][text]" placeholder="<?php echo e(trans('cruds.answer.fields.text')); ?>" aria-label="<?php echo e(trans('cruds.answer.fields.text')); ?>">
                    </div>
                </div>
            `;
            answersWrapper.insertAdjacentHTML('beforeend', newAnswerHtml);
        } else if (event.target.classList.contains('remove-answer')) {
            const answerItem = event.target.closest('.answer-item');
            answerItem.remove();
        }
    });
</script>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/admin/course/edit.blade.php ENDPATH**/ ?>