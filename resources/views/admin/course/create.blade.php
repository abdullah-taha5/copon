 @extends('layouts.admin')
@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">{{ env('APP_NAME') }} / 
        {{ trans('cruds.course.title_singular') }}
        {{ trans('global.list') }} /
    </span> 
    {{ trans('global.create') }}
    {{ trans('cruds.course.title_singular') }}
</h4>  

<div class="row">
    <div class="col-lg-9">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger mb-2" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="{{ route('admin.courses.store') }}" method="POST" class="pt-3" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2 {{ $errors->has('title') ? 'invalid' : '' }}">
                        <label class="form-label required" for="title">{{ trans('cruds.course.fields.title') }}</label>
                        <input class="form-control" type="text" name="title" id="title" required
                            value="{{ old('title') }}">
                        <div class="validation-message">
                            {{ $errors->first('title') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.course.fields.title_helper') }}
                        </div>
                    </div>
                    <div class="form-group mb-2 {{ $errors->has('description') ? 'invalid' : '' }}">
                        <label class="form-label required"
                            for="description">{{ trans('cruds.course.fields.description') }}</label>
                        <textarea class="form-control" name="description" id="description" required rows="4">{{ old('description') }}</textarea>
                        <div class="validation-message">
                            {{ $errors->first('description') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.course.fields.description_helper') }}
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
                    <div class="form-group mb-2 {{ $errors->has('course.price') ? 'invalid' : '' }}">
                        <label class="form-label" for="price">{{ trans('cruds.course.fields.price') }}</label>
                        <input class="form-control" type="number" name="price" id="price"
                            value="{{ old('price') }}" step="0.01">
                        <div class="validation-message">
                            {{ $errors->first('course.price') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.course.fields.price_helper') }}
                        </div>
                    </div>
                    <div class="form-group mb-2 {{ $errors->has('course.is_published') ? 'invalid' : '' }}">
                        <label class="switch">
                            <input type="checkbox" class="switch-input" name="is_published" {{ old('is_published') == 1 ? 'checked' : '' }}>
                            <span class="switch-toggle-slider">
                                <span class="switch-on">
                                    <i class="ti ti-check"></i>
                                </span>
                                <span class="switch-off">
                                    <i class="ti ti-x"></i>
                                </span>
                            </span>
                            <span class="switch-label">{{ trans('cruds.course.fields.is_published') }}</span>
                        </label>
                        <div class="validation-message">
                            {{ $errors->first('course.is_published') }}
                        </div>
                    </div>
                </div> 
            </div>
            <br>
            <div class="form-group mb-4">
                <h3>{{ trans('cruds.unit.title_singular') }} {{ trans('global.list') }}</h3>
                <div id="units-wrapper">
                   
                </div>
                <button type="button" class="btn btn-primary mt-4" id="add-unit">{{ trans('global.add') }} {{ trans('cruds.unit.title_singular') }}</button>
            </div>
            
            
            <div class="form-group mb-2">
                <button class="btn btn-primary mr-2" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/dropzone/dropzone.css" />
@endpush
@push('scripts')
    <script src="{{ asset('/') }}assets/vendor/libs/dropzone/dropzone.js"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>
 <script>
    let unitCounter = {{ $course->units->count() }}; // Initialize unitCounter based on existing units
    let quizCounter = 0; // Counter to track quiz IDs

    document.getElementById('add-unit').addEventListener('click', function() {
        const unitWrapper = document.getElementById('units-wrapper');
        const unitCount = unitCounter++;
        const newUnitHtml = `
            <div class="card mb-2 unit-item">
                <div class="card-body">
                    <!-- Unit Form Fields -->
                    <div class="form-group">
                        <label for="new_unit_title_${unitCount}">{{ trans('cruds.unit.fields.title') }}</label>
                        <input class="form-control" type="text" name="units[new][${unitCount}][title]" id="new_unit_title_${unitCount}">
                    </div>
                    <div class="lessons-wrapper">
                        <label>{{ trans('cruds.lesson.title_singular') }} {{ trans('global.list') }}</label>
                    </div>
                    <button type="button" class="btn btn-primary add-lesson" data-unit-id="${unitCount}">{{ trans('global.add') }} {{ trans('cruds.lesson.title_singular') }}</button>
                    
                    <!-- Quizzes Section -->
                    <div class="quiz-wrapper mt-4">
                        <h5>{{ trans('cruds.quiz.title_singular') }}</h5>
                    </div>
                    <button type="button" class="btn btn-primary add-quiz" data-unit-id="${unitCount}">{{ trans('global.add') }} {{ trans('cruds.quiz.title_singular') }}</button>
                    
                    <button type="button" class="btn btn-danger remove-unit">{{ trans('global.delete') }}</button>
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
                            <label for="new_lesson_title_${unitId}_${lessonCount}">{{ trans('cruds.lesson.fields.title') }}</label>
                            <input class="form-control" type="text" name="units[new][${unitId}][lessons][new][${lessonCount}][title]" id="new_lesson_title_${unitId}_${lessonCount}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_content_${unitId}_${lessonCount}">{{ trans('cruds.lesson.fields.content') }}</label>
                            <textarea class="form-control" name="units[new][${unitId}][lessons][new][${lessonCount}][content]" id="new_lesson_content_${unitId}_${lessonCount}" rows="3"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_thumb_${unitId}_${lessonCount}">{{ trans('cruds.lesson.fields.thumbnail') }}</label>
                            <input type="file" name="units[new][${unitId}][lessons][new][${lessonCount}][thumbnail]" class="form-control" id="new_lesson_thumb_${unitId}_${lessonCount}">                        
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_video_${unitId}_${lessonCount}">{{ trans('cruds.lesson.fields.video') }}</label>
                            <input type="file" name="units[new][${unitId}][lessons][new][${lessonCount}][video]" class="form-control" id="new_lesson_video_${unitId}_${lessonCount}">                        
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="new_lesson_iframe_${unitId}_${lessonCount}">{{ trans('cruds.lesson.fields.iframe') }}</label>
                            <textarea class="form-control" name="units[new][${unitId}][lessons][new][${lessonCount}][iframe]" id="new_lesson_iframe_${unitId}_${lessonCount}" rows="3"></textarea>
                        </div>
                    <button type="button" class="btn btn-danger mt-2 remove-lesson">{{ trans('global.delete') }}</button>
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
                        <label for="new_quiz_title_${quizCounter}">{{ trans('cruds.quiz.fields.title') }}</label>
                        <input class="form-control" type="text" name="units[new][${unitId}][quizzes][new][${quizCounter}][title]" id="new_quiz_title_${quizCounter}">
                    </div>
                    <br>
                    <div class="questions-wrapper">
                        <h4>{{ trans('cruds.quiz.fields.questions') }}</h4>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary add-question" data-unit-id="${unitId}" data-quiz-id="${quizCounter}">{{ trans('global.add') }} {{ trans('cruds.question.title_singular') }}</button>
                    <button type="button" class="btn btn-danger mt-2 remove-quiz">{{ trans('global.delete') }}</button>
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
                        <label for="new_question_text_${unitId}_${quizId}_${questionCount}">{{ trans('cruds.question.fields.text') }}</label>
                        <textarea class="form-control" name="units[new][${unitId}][quizzes][new][${quizId}][questions][${questionCount}][text]" id="new_question_text_${unitId}_${quizId}_${questionCount}" rows="3"></textarea>
                    </div>
                    <div class="answers-wrapper">
                        <h6>{{ trans('cruds.question.fields.answers') }}</h6>
                    </div>
                    <button type="button" class="btn btn-primary add-answer" data-unit-id="${unitId}" data-quiz-id="${quizId}" data-question-id="${questionCount}">{{ trans('global.add') }} {{ trans('cruds.answer.title_singular') }}</button>
                    <button type="button" class="btn btn-danger remove-question">{{ trans('global.delete') }}</button>
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
                                <span class="switch-label">{{ trans('cruds.answer.fields.correct') }}</span>
                            </label>
                        </span>
                        <input type="text" class="form-control" name="units[new][${unitId}][quizzes][new][${quizId}][questions][${questionId}][answers][${answerCount}][text]" placeholder="{{ trans('cruds.answer.fields.text') }}" aria-label="{{ trans('cruds.answer.fields.text') }}">
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

    @endpush
@endsection