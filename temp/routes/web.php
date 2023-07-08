<?php

use App\Models\Admin;
use App\Models\Trainer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\Admin\AdminAuthController;
use App\Http\Controllers\web\Website\AuthPageController;
use App\Http\Controllers\web\Website\HomePageController;
use App\Http\Controllers\web\Teacher\TeacherAuthController;
use App\Http\Controllers\web\Website\CoursesPageController;
use App\Http\Controllers\web\Website\PackagesPageController;
use App\Http\Controllers\web\Teacher\TeacherAccountController;
use App\Http\Controllers\web\Website\InnovationPageController;
use App\Http\Controllers\web\Teacher\TeacherInnovationController;
use App\Http\Controllers\web\Teacher\TeacherSubscriptionController;
use App\Http\Controllers\web\Admin\CourseManagement\CourseController;
use App\Http\Controllers\web\Admin\UserManagement\AdminCrudController;
use App\Http\Controllers\web\Admin\FacultyManagement\FacultyController;
use App\Http\Controllers\web\Admin\PackageManagement\PackageController;
use App\Http\Controllers\web\Admin\ResourceManagement\LessonController;
use App\Http\Controllers\web\Admin\WorkshopManagement\TrainerController;
use App\Http\Controllers\web\Admin\CategoryManagement\CategoryController;
use App\Http\Controllers\web\Admin\UserManagement\TeachersCrudController;
use App\Http\Controllers\web\Admin\WorkshopManagement\WorkshopController;
use App\Http\Controllers\web\Admin\ResourceManagement\DemoClassController;
use App\Http\Controllers\web\Admin\ResourceManagement\WorksheetController;
use App\Http\Controllers\web\Admin\ResourceManagement\LessonPlanController;
use App\Http\Controllers\web\Admin\InnovationManagement\InnovationController;
use App\Http\Controllers\web\Admin\WorkshopManagement\WorkshopTestimonialController;
use Illuminate\Support\Facades\File;




Route::get('/hello', function(){

    // $course = App\Models\Course::find(13);

    // dd($course->facilitators());
    
    File::link(
        storage_path('app/public'), public_path('storage')
    );

});

// **************************** webSITE *************************************

Route::get('/', [HomePageController::class, 'homepage'])->name('website.homepage');

Route::view('/test', 'admin.layouts.parent');

Route::get('/innovations', [InnovationPageController::class, 'deliver_innovations'])->name('website.innovation.all');

Route::get('/packages', [PackagesPageController::class, 'deliver_packages'])->name('website.packages.all');

Route::get('/courses', [CoursesPageController::class, 'deliver_courses'])->name('website.courses.all');

Route::get('/courses/course/{id}', [CoursesPageController::class, 'deliver_single'])->name('website.courses.single');





// **************************** ONLY FOR TEACHERS*************************************

Route::group(['middleware' => 'guest.teacher'], function(){

    Route::get('/sign-up', [AuthPageController::class, 'signup_page'])->name('website.auth.signup');

    Route::post('/sign-up', [AuthPageController::class, 'attempt_signup']);

    Route::get('/teacher/sign-in', [TeacherAuthController::class, 'teacher_signin_page'])->name('website.auth.teacher.signin');

    Route::post('/teacher/sign-in', [TeacherAuthController::class, 'teacher_attempt_signin']);

});

Route::group(['middleware' => 'teacher', 'prefix' => 'account/teacher'], function(){

    // PROFILE

    Route::get('/profile', [TeacherAccountController::class, 'get_profile'])->name('teacher.profile');

    Route::get('/profile/edit', [TeacherAccountController::class, 'get_profile_edit_form'])->name('teacher.profile.edit');

    Route::post('/profile/edit', [TeacherAccountController::class, 'store_data_of_profile_edit_form']);

    Route::post('/sign-out', [TeacherAuthController::class, 'teacher_attempt_signout'])->name('website.auth.teacher.signout');

    //INNOVATION

    Route::get('/innovation/create', [TeacherInnovationController::class, 'create_innovation'])->name('teacher.innovation.create');

    Route::post('/innovation/store', [TeacherInnovationController::class, 'store_innovation'])->name('teacher.innovation.store');

    Route::get('/innovation/edit/{innovation_id}', [TeacherInnovationController::class, 'edit_innovation'])->name('teacher.innovation.edit');

    Route::post('/innovation/update/{innovation_id}', [TeacherInnovationController::class, 'update_innovation'])->name('teacher.innovation.update');

    //PACKAGE-SUBSCRIPTION
    Route::post('/package/subscribe', [TeacherSubscriptionController::class, 'subscribe'])->name('teacher.package.subscribe');

    //COURSE
    Route::post('/course/{courseID}/teacher/{teacherID}/unlock', [CoursesPageController::class, 'unlock_course'])->name('course.teacher.unlock');

    Route::post('/course/{courseID}/teacher/{teacherID}/purchase', [CoursesPageController::class, 'purchase_course'])->name('course.teacher.purchase');

    Route::get('/course/{courseID}/teacher/{teacherID}', [CoursesPageController::class, 'scaffold_course'])->name('course.teacher.initiate');

    Route::get('/course/{courseID}/sequence/{desired_sequence}', [CoursesPageController::class, 'load_course_content'])->name('course.teacher.load_course_content');

    Route::post('course/video/course_video_watched', [CoursesPageController::class, 'course_video_just_been_watched'])->name('course.teacher.course_video_watched');

    Route::post('course/quiz/quiz_submited', [CoursesPageController::class, 'course_quiz_just_been_submited'])->name('course.teacher.course_quiz_submited');
    


});


// **************************** ONLY FOR ADMINS/SUPERADMINS*************************************

Route::get('/admin/login', [AdminAuthController::class, 'show_login_form'])->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'perform_login']);

Route::group(['middleware' => 'admin', 'prefix' => 'admin/dashboard'], function(){

    Route::get('/', [AdminAuthController::class, 'show_dashboard'])->name('admin.dashboard');

    Route::post('/logout', [AdminAuthController::class, 'perform_logout'])->name('admin.logout');

    // -------------------STUFF ONLY SUPER ADMIN CAN PERFORM-------------------

    Route::group(['middleware' => 'superadmin'], function(){

        Route::get('/user-management/admins/list', [AdminCrudController::class, 'admins'])->name('admin.user-management.admins');
        Route::get('/user-management/admins/create', [AdminCrudController::class, 'show_create_form'])->name('admin.user-management.create');
        Route::post('/user-management/admins/create', [AdminCrudController::class, 'create']);
        Route::get('/user-management/admins/edit/{id}', [AdminCrudController::class, 'show_edit_form'])->name('admin.user-management.edit');
        Route::post('/user-management/admins/edit/{id}', [AdminCrudController::class, 'update_admin']);
        Route::get('/user-management/admins/revoke-access/{id}', [AdminCrudController::class, 'revoke_access'])->name('admin.user-management.revoke');
        Route::get('/user-management/admins/regain-access/{id}', [AdminCrudController::class, 'regain_access'])->name('admin.user-management.regain');

        // Package Management
        Route::get('/package-management/packages/create', [PackageController::class, 'show_create_form'])->name('package-management.create');
        Route::post('/package-management/packages/create', [PackageController::class, 'create']);
        Route::get('/package-management/packages/edit/{id}', [PackageController::class, 'show_edit_form'])->name('package-management.edit');
        Route::post('/package-management/packages/edit/{id}', [PackageController::class, 'update']);
        Route::get('/package-management/packages/list', [PackageController::class, 'list'])->name('package-management.list');
        Route::get('/package-management/packages/activate/{id}', [PackageController::class, 'activate'])->name('package-management.activate');
        Route::get('/package-management/packages/inactivate/{id}', [PackageController::class, 'inactivate'])->name('package-management.inactivate');
    
    });

    // -------------------STUFF BOTH SUPER ADMIN AND ADMINS CAN PERFORM-------------------

    // Teacher User Management
    Route::get('/user-management/teachers/list', [TeachersCrudController::class, 'teachers'])->name('user-management.teacher.list');
    Route::get('/user-management/teachers/create', [TeachersCrudController::class, 'show_create_form'])->name('user-management.teacher.create');
    Route::post('/user-management/teachers/create', [TeachersCrudController::class, 'create']);
    Route::get('/user-management/teachers/edit/{id}', [TeachersCrudController::class, 'show_edit_form'])->name('user-management.teacher.edit');
    Route::post('/user-management/teachers/edit/{id}', [TeachersCrudController::class, 'update']);

    //Course Management
    Route::get('/course-management/courses/create', [CourseController::class, 'show_create_form'])->name('course-management.course.create');
    Route::post('/course-management/courses/create', [CourseController::class, 'create']);
    Route::get('/course-management/courses/list', [CourseController::class, 'list'])->name('course-management.course.list');
    Route::get('/course-management/courses/edit/{id}', [CourseController::class, 'show_edit_form'])->name('course-management.course.edit');
    Route::post('/course-management/courses/edit/{id}', [CourseController::class, 'update']);
    Route::get('/course-management/courses/activate/{id}', [CourseController::class, 'activate'])->name('course-management.course.avtivate');
    Route::get('/course-management/courses/deactivate/{id}', [CourseController::class, 'deactivate'])->name('course-management.course.deavtivate');

    //sequence
    Route::get('/course-management/courses/{id}/sequence', [CourseController::class, 'sequence'])->name('course-management.course.sequence');
    Route::post('/course-management/courses/{id}/sequence/set', [CourseController::class, 'set_sequence'])->name('course-management.course.sequence.set');

    //Faculty management
    Route::get('/faculty-management/faculties/create', [FacultyController::class, 'show_create_form'])->name('faculty-management.faculty.create');
    Route::post('/faculty-management/faculties/create', [FacultyController::class, 'store']);
    Route::get('/faculty-management/faculties/list', [FacultyController::class, 'list'])->name('faculty-management.faculty.list');
    Route::get('/faculty-management/faculties/edit/{id}', [FacultyController::class, 'show_edit_form'])->name('faculty-management.faculty.edit');
    Route::post('/faculty-management/faculties/edit/{id}', [FacultyController::class, 'update']);

    //Video
    Route::get('/course-management/courses/{id}/video/create', [CourseController::class, 'create_video'])->name('course-management.course.video.create');
    Route::post('/course-management/courses/{id}/video/create', [CourseController::class, 'store_video']);
    Route::get('/course-management/courses/video/edit/{id}', [CourseController::class, 'edit_video'])->name('course-management.course.video.edit');
    Route::post('/course-management/courses/video/edit/{id}', [CourseController::class, 'update_video']);

    //quiz
    Route::get('/course-management/courses/{id}/quiz/create', [CourseController::class, 'create_quiz'])->name('course-management.course.quiz.create');
    Route::post('/course-management/courses/{id}/quiz/create', [CourseController::class, 'store_quiz']);
    Route::get('/course-management/courses/quiz/edit/{id}', [CourseController::class, 'edit_quiz'])->name('course-management.course.quiz.edit');
    Route::post('/course-management/courses/quiz/edit/{id}', [CourseController::class, 'update_quiz']);

    //question
    Route::get('/course-management/courses/quiz/{id}/question/create', [CourseController::class, 'create_question'])->name('course-management.course.question.create');
    Route::post('/course-management/courses/quiz/{id}/question/create', [CourseController::class, 'store_question']);
    Route::get('/course-management/courses/quiz/{id}/question/list', [CourseController::class, 'list_questions'])->name('course-management.course.question.list');
    Route::get('/course-management/courses/quiz/question/edit/{id}', [CourseController::class, 'edit_question'])->name('course-management.course.question.edit');
    Route::post('/course-management/courses/quiz/question/edit/{id}', [CourseController::class, 'update_question']);

    //LessonPlan
    Route::get('/resource-management/lesson-plans/index', [LessonPlanController::class, 'lesson_plan_index'])->name('resource-management.lessonplan.index');
    Route::get('/resource-management/lesson-plans/list', [LessonPlanController::class, 'lesson_plan_list'])->name('resource-management.lessonplan.list');
    Route::get('/resource-management/lesson-plan/create', [LessonPlanController::class, 'lesson_plan_create_form'])->name('resource-management.lessonplan.create');
    Route::post('/resource-management/lesson-plan/create', [LessonPlanController::class, 'lesson_plan_store']);
    Route::get('/resource-management/lesson-plan/edit/{id}', [LessonPlanController::class, 'lesson_plan_edit_form'])->name('resource-management.lessonplan.edit');
    Route::post('/resource-management/lesson-plan/edit/{id}', [LessonPlanController::class, 'update']);
    Route::get('/resource-management/lesson-plan/search', [LessonPlanController::class, 'search'])->name('resource-management.lessonplan.search');

    // WORKSHEET
    Route::get('resource-management/worksheet/index', [WorksheetController::class, 'index'])->name('resource-management.worksheet.index');
    Route::get('resource-management/worksheet/list', [WorksheetController::class, 'list'])->name('resource-management.worksheet.list');
    Route::get('resource-management/worksheet/create', [WorksheetController::class, 'create'])->name('resource-management.worksheet.create');
    Route::post('resource-management/worksheet/store', [WorksheetController::class, 'store'])->name('resource-management.worksheet.store');
    Route::get('resource-management/worksheet/edit/{worksheet_id}', [WorksheetController::class, 'edit'])->name('resource-management.worksheet.edit');
    Route::post('resource-management/worksheet/update/{worksheet_id}', [WorksheetController::class, 'update'])->name('resource-management.worksheet.update');
    Route::get('resource-management/worksheet/change-status/{worksheet_id}', [WorksheetController::class, 'changeStatus'])->name('resource-management.worksheet.change-status');

    // DEMO CLASS
    Route::get('/resource-management/demo-class/index', [DemoClassController::class, 'index'])->name('resource-management.demo-class.index');
    Route::get('resource-management/demo-class/list', [DemoClassController::class, 'list'])->name('resource-management.demo-class.list');
    Route::get('resource-management/demo-class/create', [DemoClassController::class, 'create'])->name('resource-management.demo-class.create');
    Route::post('resource-management/demo-class/store', [DemoClassController::class, 'store'])->name('resource-management.demo-class.store');
    Route::get('resource-management/demo-class/edit/{demo_class_id}', [DemoClassController::class, 'edit'])->name('resource-management.demo-class.edit');
    Route::post('resource-management/demo-class/update/{demo_class_id}', [DemoClassController::class, 'update'])->name('resource-management.demo-class.update');
    Route::get('resource-management/demo-class/change-status/{demo_class_id}', [DemoClassController::class, 'changeStatus'])->name('resource-management.demo-class.change-status');

    // TRAINER
    Route::get('workshop-management/trainer/index', [TrainerController::class, 'index'])->name('workshop-management.trainer.index');
    Route::get('workshop-management/trainer/create', [TrainerController::class, 'create'])->name('workshop-management.trainer.create');
    Route::post('workshop-management/trainer/store', [TrainerController::class, 'store'])->name('workshop-management.trainer.store');
    Route::get('workshop-management/trainer/edit/{trainer_id}', [TrainerController::class, 'edit'])->name('workshop-management.trainer.edit');
    Route::post('workshop-management/trainer/update/{trainer_id}', [TrainerController::class, 'update'])->name('workshop-management.trainer.update');

    // WORKSHOP
    Route::get('workshop-management/workshop/index', [WorkshopController::class, 'index'])->name('workshop-management.workshop.index');
    Route::get('workshop-management/workshop/create', [WorkshopController::class, 'create'])->name('workshop-management.workshop.create');
    Route::post('workshop-management/workshop/store', [WorkshopController::class, 'store'])->name('workshop-management.workshop.store');
    Route::get('workshop-management/workshop/edit/{workshop_id}', [WorkshopController::class, 'edit'])->name('workshop-management.workshop.edit');
    Route::post('workshop-management/workshop/update/{workshop_id}', [WorkshopController::class, 'update'])->name('workshop-management.workshop.update');
    Route::get('workshop-management/workshop/change-status/{workshop_id}', [WorkshopController::class, 'changeStatus'])->name('workshop-management.workshop.change-status');

    // WORKSHOP TESTIMONIAL
    Route::get('workshop-management/workshop-testimonial/index/{workshop_id}', [WorkshopTestimonialController::class, 'index'])->name('workshop-management.workshop-testimonial.index');
    Route::get('workshop-management/workshop-testimonial/create/{workshop_id}', [WorkshopTestimonialController::class, 'create'])->name('workshop-management.workshop-testimonial.create');
    Route::post('workshop-management/workshop-testimonial/store', [WorkshopTestimonialController::class, 'store'])->name('workshop-management.workshop-testimonial.store');
    Route::get('workshop-management/workshop-testimonial/edit/{workshop_testimonial_id}', [WorkshopTestimonialController::class, 'edit'])->name('workshop-management.workshop-testimonial.edit');
    Route::post('workshop-management/workshop-testimonial/update/{workshop_testimonial_id}', [WorkshopTestimonialController::class, 'update'])->name('workshop-management.workshop-testimonial.update');

    // Lesson
    Route::get('/resource-management/lesson/create/{id}', [LessonController::class, 'lesson_create_form'])->name('resource-management.lesson.create');
    Route::post('/resource-management/lesson/create/{id}', [LessonController::class, 'lesson_store'])->name('resource-management.lesson.create');
    Route::get('/resource-management/lesson-plan/{id}/lessons', [LessonController::class, 'lesson_list'])->name('resource-management.lesson.list');
    Route::get('/resource-management/lesson/delete/{id}', [LessonController::class, 'delete'])->name('resource-management.lesson.delete');
    Route::get('/resource-management/lesson/edit/{id}', [LessonController::class, 'lesson_edit_form'])->name('resource-management.lesson.edit');
    Route::post('/resource-management/lesson/edit/{id}', [LessonController::class, 'lesson_update']);
    Route::get('/resource-management/lesson/sequence/set/{lessonplan_id}', [LessonController::class, 'set_sequence_form'])->name('resource-management.lesson.sequence.set');
    Route::post('/resource-management/lesson/sequence/update/{lessonplan_id}', [LessonController::class, 'set_sequence_update'])->name('resource-management.lesson.sequence.update');

    // INNOVATION
    Route::get('innovation-management/innovation/index', [InnovationController::class, 'index'])->name('innovation-management.innovation.index');
    Route::get('innovation-management/innovation/show/{innovation_id}', [InnovationController::class, 'show'])->name('innovation-management.innovation.show');
    Route::post('innovation-management/innovation/update-jury-points/{innovation_id}', [InnovationController::class, 'updateJuryPoints'])->name('innovation-management.innovation.update-jury-points');
    Route::get('innovation-management/innovation/change-status/{innovation_id}', [InnovationController::class, 'changeStatus'])->name('innovation-management.innovation.change-status');

    //Category
    Route::get('/category-management/category/create', [CategoryController::class, 'create'])->name('category-management.create');
    Route::post('/category-management/category/create', [CategoryController::class, 'store']);
    Route::get('/category-management/category/list', [CategoryController::class, 'list'])->name('category-management.list');
    Route::get('/category-management/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-management.edit');
    Route::post('/category-management/category/edit/{id}', [CategoryController::class, 'update']);

    
});


