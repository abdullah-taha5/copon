<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Choice;
use App\Models\CouponCounter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Unit;
use App\Services\CourseService;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public CourseService $service;

    /**
     * Constructor to initialize the User model.
     */
    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course.create');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course->load('units'); // Assuming you have a units relationship on the Course model
        return view('admin.course.edit', compact('course'));
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course.show', compact('course'));
    }

    public function storeMedia(Request $request)
    {

        abort_if(Gate::none(['course_create', 'course_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Course();
        $model->id = $request->input('model_id', 0);
        $model->exists = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function store(StoreCourseRequest $request)
    {
        $this->service->store($request);

        return redirect()->route('admin.courses.index')->with('success', __('global.created_successfully'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        DB::beginTransaction();
        

      try {
            if ($request->units != null) {
                foreach ($request->units as $status => $array) {
                    if($status == 'old') {
                        foreach ($array as $unitID => $unitOp) {
                            $unit = Unit::find($unitID)-> update([
                                'name' => $unitOp['title'],
                            ]);

                            if (isset($unitOp['lessons'])) {
                                if (isset($unitOp['lessons']['old'])) {
                                    foreach ($unitOp['lessons']['old'] as $lessonID => $lesson) {
                                        $lessonModel = Lesson::find($lessonID)->update([
                                            'title' => $lesson['title'],
                                            'short_text' => $lesson['content'],
                                            'iframe' => $lesson['iframe'] ?? null
                                        ]);
                                        if (isset($lesson['thumbnail'])) {
                                            $thumbnailMedia = $lessonModel->addMedia($lesson['thumbnail'])->toMediaCollection('lesson_thumbnail');
                                            $thumbnailMedia->wasRecentlyCreated = true;
                                        }
                                        if (isset($lesson['video'])) {
                                            $videoMedia = $lessonModel->addMedia($lesson['video'])->toMediaCollection('lesson_video');
                                            $videoMedia->wasRecentlyCreated = true;
                                        }
                                    }
                                }
                            }
                            if (isset($unitOp['quizzes'])) {
                                if (isset($unitOp['quizzes']['old'])) {
                                    foreach ($unitOp['quizzes']['old'] as $quizID => $quiz) {
                                        $quizModel = Quiz::find($quizID)->update([
                                            'title' => $quiz['title'],
                                        ]);
                                        if (isset($quiz['questions'])) {
                                            foreach ($quiz['questions'] as $questionID => $question) {
                                                Question::find($questionID)->update([
                                                    'question_text' => $question['text'],
                                                ]);
                                                foreach ($question['answers'] as $choiceID => $answer) {
                                                    Choice::find($choiceID)->update([
                                                        'choice_text' => $answer['text'],
                                                        'is_correct' => isset($answer['correct']) && $answer['correct'] == 'on' ? true : false
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                        }
                    } else {
                        foreach ($array as $UnitID => $unitOp) {
                            if(isset($unitOp['title'])) {
                                $unit = Unit::create([
                                    'name' => $unitOp['title'],
                                    'course_id' => $course->id
                                ]);
                            } else {
                                $unit = Unit::find($UnitID);
                            }
                           
                            if (isset($unitOp['lessons'])) {
                                if (isset($unitOp['lessons']['new'])) {
                                    foreach ($unitOp['lessons']['new'] as $number => $lesson) {
                                        $lessonModel = Lesson::create([
                                            'title' => $lesson['title'],
                                            'short_text' => $lesson['content'],
                                            'unit_id' => $unit->id,
                                            'iframe' => $lesson['iframe'] ?? null
                                        ]);
                                        $thumbnailMedia = $lessonModel->addMedia($lesson['thumbnail'])->toMediaCollection('lesson_thumbnail');
                                        $thumbnailMedia->wasRecentlyCreated = true;
                                        if (isset($lesson['video'])) {
                                            $videoMedia = $lessonModel->addMedia($lesson['video'])->toMediaCollection('lesson_video');
                                            $videoMedia->wasRecentlyCreated = true;
                                        }
                                    }
        
                                }
                            }
        
                            if (isset($unitOp['quizzes'])) {
                                if (isset($unitOp['quizzes']['new'])) {
                                    foreach ($unitOp['quizzes']['new'] as $QuizID => $quiz) {

                                        if(isset($quiz['title'])) {
                                            $quizModel = Quiz::create([
                                                'title' => $quiz['title'],
                                                'unit_id' => $unit->id,
                                            ]);
                                        } else {
                                            $quizModel = Quiz::find($QuizID);
                                        }
            
                                        if (isset($quiz['questions'])) {
                                            foreach ($quiz['questions'] as $number => $question) {
                                                $question1 = $quizModel->questions()->create([
                                                    'question_text' => $question['text'],
                                                    'question_type' => 'multiple_choice'
                                                ]);
                                                foreach ($question['answers'] as $number => $answer) {
                                                    $question1->choices()->create([
                                                        'choice_text' => $answer['text'],
                                                        'is_correct' => isset($answer['correct']) && $answer['correct'] == 'on' ? true : false
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
        
                        }
                    }
                }
            }
            DB::commit();
            return redirect()->route('admin.courses.index')->with('success', __('global.created_successfully'));
        } catch (\Throwable $th) {
        DB::rollBack();
        throw $th;
    }


        //  $this->service->update($request, $course);

    }

    public function destroy(Course $course)
    {
        $response = $this->service->delete($course);

        return redirect()->route('admin.users.index')->with('success', $response['message']);
    }
    public function single(Request $request, Course $course)
    {
        $course->load('lessons');
        CouponCounter::create([
            'user_id' => auth()->user()->id,
            'coupon_id' => $request->coupon->id,
        ]);
        return view('admin.singlee', compact('course'));
    }
}
