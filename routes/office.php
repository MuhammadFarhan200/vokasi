<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Office\AuthController;
use App\Http\Controllers\Office\About\VisionController;
use App\Http\Controllers\Office\Civitas\DosenController;
use App\Http\Controllers\Office\About\HistoryController;
use App\Http\Controllers\Office\Timeline\NewsController;
use App\Http\Controllers\Office\Timeline\ActivityController;
use App\Http\Controllers\Office\About\OrganizationController;
use App\Http\Controllers\Office\Account\DekanController;
use App\Http\Controllers\Office\Dekan\DekanController as OfficeDekanController;
use App\Http\Controllers\Office\Account\HimpunanCategoryController;
use App\Http\Controllers\Office\Account\HimpunanController;
use App\Http\Controllers\Office\Account\KAProdiCategoryController;
use App\Http\Controllers\Office\Account\KAProdiController;
use App\Http\Controllers\Office\KAProdi\KAProdiController as OfficeKAProdiController;
use App\Http\Controllers\Office\Appearance\CarouselController;
use App\Http\Controllers\Office\Appearance\FooterController;
use App\Http\Controllers\Office\Appearance\HomeMenuController;
use App\Http\Controllers\Office\CategoryProdiController;
use App\Http\Controllers\Office\Civitas\DosenCategoryController;
use App\Http\Controllers\Office\Civitas\Profile\ArticleController;
use App\Http\Controllers\Office\Civitas\Profile\BackgroundController;
use App\Http\Controllers\Office\Civitas\Profile\BooksController;
use App\Http\Controllers\Office\Civitas\Profile\ContactController;
use App\Http\Controllers\Office\Civitas\Profile\EducationController;
use App\Http\Controllers\Office\Civitas\Profile\ExperienceController;
use App\Http\Controllers\Office\Civitas\Profile\FundingController;
use App\Http\Controllers\Office\Civitas\Profile\PublicationController;
use App\Http\Controllers\Office\Civitas\Profile\ResearchController;
use App\Http\Controllers\Office\Civitas\Profile\StaffActivityController;
use App\Http\Controllers\Office\Civitas\Profile\StaffEducationController;
use App\Http\Controllers\Office\Civitas\Profile\StudiesController;
use App\Http\Controllers\Office\Civitas\StaffCategoryController;
use App\Http\Controllers\Office\Civitas\StaffController;
use App\Http\Controllers\Office\CommentController;
use App\Http\Controllers\Office\DosenProfileController;
use App\Http\Controllers\Office\FED\FedController;
use App\Http\Controllers\Office\FRK\FrkController;
use App\Http\Controllers\Office\FRK\Pendidikan\CollegeLeadershipPositions;
use App\Http\Controllers\Office\FRK\Pendidikan\FinalProjectAdvisorController;
use App\Http\Controllers\Office\FRK\Pendidikan\FinalProjectTesterController;
use App\Http\Controllers\Office\FRK\Pendidikan\TeachingController;
use App\Http\Controllers\Office\FRK\SubjectController;
use App\Http\Controllers\Office\FRK\TestedComponentController;
use App\Http\Controllers\Office\FRK\TesterPositionController;
use App\Http\Controllers\Office\Himatek\HimatekController as OfficeHimatekController;
use App\Http\Controllers\Office\Himatif\HimatifController as OfficeHimatifController;
use App\Http\Controllers\Office\Himatera\HimateraController as OfficeHimateraController;
use App\Http\Controllers\Office\MainController;
use App\Http\Controllers\Office\ProgramStudiController;
use App\Http\Controllers\Office\Setting\LogoController;
use App\Http\Controllers\Office\Setting\RoleController;
use App\Http\Controllers\Office\StaffProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['domain' => ''], function () {
    Route::prefix('office')->name('office.')->group(function () {
        Route::get('/', function () {
            return redirect()->route('office.dashboard.index');
        });
        Route::prefix('auth')->name('auth.')->middleware('guest')->group(function () {
            Route::view('', 'pages.app.auth.login')->name('index');
            Route::view('forgot', 'pages.app.auth.forgot')->name('forgot');
            Route::get('reset/{token}', fn($token) => view('pages.profile.overview', compact('token')))->name('reset');
            Route::post('authenticate',[AuthController::class, 'do_login'])->name('login');

            Route::post('forgot-password',[AuthController::class, 'do_forgot'])->name('doforgot');

            Route::post('reset',[AuthController::class, 'do_reset'])->name('doreset');

        });
        Route::middleware('auth')->group(function () {
            Route::prefix('dashboard')->name('dashboard.')->group(function () {
                Route::get('', [MainController::class, 'index'])->name('index');
            });
            Route::prefix('dosen')->name('dosen.')->middleware('frole:4')->group(function () {
                Route::get('identitas', [DosenProfileController::class, 'identitas_dosen'])->name('identitas.index');
                Route::patch('identitas/update', [DosenProfileController::class, 'update_identitas_dosen'])->name('identitas.update');
                Route::get('latar-belakang', [DosenProfileController::class, 'latar_dosen'])->name('latar_belakang.index');
                Route::post('latar-belakang/store', [DosenProfileController::class, 'store_latar_dosen'])->name('latar_belakang.store');
                Route::get('latar-belakang/edit', [DosenProfileController::class, 'edit_latar_dosen'])->name('latar_belakang.edit');
                Route::patch('latar-belakang/update', [DosenProfileController::class, 'update_latar_dosen'])->name('latar_belakang.update');
                Route::get('autobiografi', [DosenProfileController::class, 'autobiografi'])->name('autobiografi.index');
                Route::patch('autobiografi/update', [DosenProfileController::class, 'update_autobiografi'])->name('autobiografi.update');
                Route::get('about', [DosenProfileController::class, 'about'])->name('about.index');
                Route::patch('about/update', [DosenProfileController::class, 'update_about'])->name('about.update');
                Route::get('ikhtisar', [DosenProfileController::class, 'ikhtisar'])->name('ikhtisar.index');
                Route::patch('ikhtisar/update', [DosenProfileController::class, 'update_ikhtisar'])->name('ikhtisar.update');
                Route::get('contact', [DosenProfileController::class, 'contact_dosen'])->name('contact.index');
                Route::post('contact/store', [DosenProfileController::class, 'store_contact'])->name('contact.store');
                Route::get('contact/edit', [DosenProfileController::class, 'edit_contact'])->name('contact.edit');
                Route::patch('contact/update', [DosenProfileController::class, 'update_contact'])->name('contact.update');

                Route::get('pendidikan', [DosenProfileController::class, 'pendidikan'])->name('pendidikan.index');
                Route::get('pendidikan/create', [DosenProfileController::class, 'create_pendidikan'])->name('pendidikan.create');
                Route::post('pendidikan/store', [DosenProfileController::class, 'store_pendidikan'])->name('pendidikan.store');
                Route::get('pendidikan/{education}/edit', [DosenProfileController::class, 'edit_pendidikan'])->name('pendidikan.edit');
                Route::patch('pendidikan/{education}/update', [DosenProfileController::class, 'update_pendidikan'])->name('pendidikan.update');
                Route::delete('pendidikan/{education}/destroy', [DosenProfileController::class, 'destroy_pendidikan'])->name('pendidikan.destroy');

                Route::get('artikel', [DosenProfileController::class, 'artikel'])->name('artikel.index');
                Route::get('artikel/create', [DosenProfileController::class, 'create_artikel'])->name('artikel.create');
                Route::post('artikel/store', [DosenProfileController::class, 'store_artikel'])->name('artikel.store');
                Route::get('artikel/{article}/edit', [DosenProfileController::class, 'edit_artikel'])->name('artikel.edit');
                Route::patch('artikel/{article}/update', [DosenProfileController::class, 'update_artikel'])->name('artikel.update');
                Route::delete('artikel/{article}/destroy', [DosenProfileController::class, 'destroy_artikel'])->name('artikel.destroy');

                Route::get('book', [DosenProfileController::class, 'book'])->name('book.index');
                Route::get('book/create', [DosenProfileController::class, 'create_book'])->name('book.create');
                Route::post('book/store', [DosenProfileController::class, 'store_book'])->name('book.store');
                Route::get('book/{book}/edit', [DosenProfileController::class, 'edit_book'])->name('book.edit');
                Route::patch('book/{book}/update', [DosenProfileController::class, 'update_book'])->name('book.update');
                Route::delete('book/{book}/destroy', [DosenProfileController::class, 'destroy_book'])->name('book.destroy');

                Route::get('publication', [DosenProfileController::class, 'publication'])->name('publication.index');
                Route::get('publication/create', [DosenProfileController::class, 'create_publication'])->name('publication.create');
                Route::post('publication/store', [DosenProfileController::class, 'store_publication'])->name('publication.store');
                Route::get('publication/{publication}/edit', [DosenProfileController::class, 'edit_publication'])->name('publication.edit');
                Route::patch('publication/{publication}/update', [DosenProfileController::class, 'update_publication'])->name('publication.update');
                Route::delete('publication/{publication}/destroy', [DosenProfileController::class, 'destroy_publication'])->name('publication.destroy');

                Route::get('studies', [DosenProfileController::class, 'studies'])->name('studies.index');
                Route::get('studies/create', [DosenProfileController::class, 'create_studies'])->name('studies.create');
                Route::post('studies/store', [DosenProfileController::class, 'store_studies'])->name('studies.store');
                Route::get('studies/{studies}/edit', [DosenProfileController::class, 'edit_studies'])->name('studies.edit');
                Route::patch('studies/{studies}/update', [DosenProfileController::class, 'update_studies'])->name('studies.update');
                Route::delete('studies/{studies}/destroy', [DosenProfileController::class, 'destroy_studies'])->name('studies.destroy');

                Route::get('pendanaan', [DosenProfileController::class, 'pendanaan'])->name('pendanaan.index');
                Route::get('pendanaan/create', [DosenProfileController::class, 'create_pendanaan'])->name('pendanaan.create');
                Route::post('pendanaan/store', [DosenProfileController::class, 'store_pendanaan'])->name('pendanaan.store');
                Route::get('pendanaan/{funding}/edit', [DosenProfileController::class, 'edit_pendanaan'])->name('pendanaan.edit');
                Route::patch('pendanaan/{funding}/update', [DosenProfileController::class, 'update_pendanaan'])->name('pendanaan.update');
                Route::delete('pendanaan/{funding}/destroy', [DosenProfileController::class, 'destroy_pendanaan'])->name('pendanaan.destroy');

                Route::get('research', [DosenProfileController::class, 'research'])->name('research.index');
                Route::get('research/create', [DosenProfileController::class, 'create_research'])->name('research.create');
                Route::post('research/store', [DosenProfileController::class, 'store_research'])->name('research.store');
                Route::get('research/{research}/edit', [DosenProfileController::class, 'edit_research'])->name('research.edit');
                Route::patch('research/{research}/update', [DosenProfileController::class, 'update_research'])->name('research.update');
                Route::delete('research/{research}/destroy', [DosenProfileController::class, 'destroy_research'])->name('research.destroy');
            });
            Route::prefix('staff')->name('staff.')->middleware('frole:5')->group(function () {
                Route::get('identitas', [StaffProfileController::class, 'identitas_staff'])->name('identitas.index');
                Route::patch('identitas/update', [StaffProfileController::class, 'update_identitas_staff'])->name('identitas.update');

                Route::get('tentang', [StaffProfileController::class, 'tentang_staff'])->name('tentang.index');
                Route::patch('tentang/update', [StaffProfileController::class, 'update_tentang_staff'])->name('tentang.update');

                Route::get('latar-belakang', [StaffProfileController::class, 'latar_staff'])->name('latar_belakang.index');
                Route::post('latar-belakang/store', [StaffProfileController::class, 'store_latar_staff'])->name('latar_belakang.store');
                Route::get('latar-belakang/edit', [StaffProfileController::class, 'edit_latar_staff'])->name('latar_belakang.edit');
                Route::patch('latar-belakang/update', [StaffProfileController::class, 'update_latar_staff'])->name('latar_belakang.update');

                Route::get('contact', [StaffProfileController::class, 'contact_staff'])->name('contact.index');
                Route::post('contact/store', [StaffProfileController::class, 'store_contact_staff'])->name('contact.store');
                Route::get('contact/edit', [StaffProfileController::class, 'edit_contact_staff'])->name('contact.edit');
                Route::patch('contact/{contact}/update', [StaffProfileController::class, 'update_contact_staff'])->name('contact.update');

                Route::get('pendidikan', [StaffProfileController::class, 'pendidikan'])->name('pendidikan.index');
                Route::get('pendidikan/create', [StaffProfileController::class, 'create_pendidikan'])->name('pendidikan.create');
                Route::post('pendidikan/store', [StaffProfileController::class, 'store_pendidikan'])->name('pendidikan.store');
                Route::get('pendidikan/{education}/edit', [StaffProfileController::class, 'edit_pendidikan'])->name('pendidikan.edit');
                Route::patch('pendidikan/{education}/update', [StaffProfileController::class, 'update_pendidikan'])->name('pendidikan.update');
                Route::delete('pendidikan/{education}/destroy', [StaffProfileController::class, 'destroy_pendidikan'])->name('pendidikan.destroy');

                Route::get('staff-activity', [StaffActivityController::class, 'staff_activity'])->name('staff_activity.index');
                Route::get('staff-activity/create', [StaffActivityController::class, 'create_activity'])->name('staff_activity.create');
                Route::post('staff-activity/store', [StaffActivityController::class, 'store'])->name('staff_activity.store');
                Route::get('staff-activity/{staffActivity}/edit', [StaffActivityController::class, 'edit_activity'])->name('staff_activity.edit');
                Route::patch('staff-activity/{staffActivity}/update', [StaffActivityController::class, 'update'])->name('staff_activity.update');
                Route::delete('staff-activity/{staffActivity}/destroy', [StaffActivityController::class, 'destroy'])->name('staff_activity.destroy');

                Route::get('experience', [ExperienceController::class, 'experience'])->name('experience.index');
                Route::get('experience/create', [ExperienceController::class, 'create_experience'])->name('experience.create');
                Route::post('experience/store', [ExperienceController::class, 'store'])->name('experience.store');
                Route::get('experience/{experience}/edit', [ExperienceController::class, 'edit_experience'])->name('experience.edit');
                Route::patch('experience/{experience}/update', [ExperienceController::class, 'update'])->name('experience.update');
                Route::delete('experience/{experience}/destroy', [ExperienceController::class, 'destroy'])->name('experience.destroy');
            });
            Route::prefix('himatek')->name('himatek.')->middleware('frole:6')->group(function () {
                Route::resource('activity', OfficeHimatekController::class);
            });
            Route::prefix('himatif')->name('himatif.')->middleware('frole:6')->group(function () {
                Route::resource('activity', OfficeHimatifController::class);
            });
            Route::prefix('himatera')->name('himatera.')->middleware('frole:6')->group(function () {
                Route::resource('activity', OfficeHimateraController::class);
            });
            Route::prefix('about')->name('about.')->middleware('frole:1')->group(function () {
                Route::resource('vision', VisionController::class);
                Route::resource('history', HistoryController::class);
                Route::resource('organization', OrganizationController::class);
            });
            Route::prefix('civitas')->name('civitas.')->middleware('frole:1')->group(function () {
                Route::resource('staff', StaffController::class);
                Route::resource('category-staff', StaffCategoryController::class);
                Route::prefix('staff')->name('staff.')->group(function () {
                    Route::get('{staff}/personal', [StaffController::class, 'identitas_staf'])->name('personal.index');
                    Route::patch('{staff}/personal', [StaffController::class, 'update_identitas_staf'])->name('personal.update');

                    Route::get('{staff}/about', [StaffController::class, 'tentang_staff'])->name('about.index');
                    Route::patch('{staff}/about', [StaffController::class, 'update_tentang_staff'])->name('about.update');

                    Route::get('{staff}/background', [StaffController::class, 'latar_staf'])->name('background.index');
                    Route::get('{staff}/background/edit', [StaffController::class, 'edit_latar_staff'])->name('background.edit');
                    Route::post('{staff}/background', [StaffController::class, 'store_latar_staf'])->name('background.store');
                    Route::patch('{staff}/background/{background}/update', [StaffController::class, 'update_latar_staff'])->name('background.update');

                    Route::resource('education', StaffEducationController::class);
                    Route::get('{staff}/education', [StaffEducationController::class, 'index'])->name('education.index');
                    Route::get('{staff}/education/create', [StaffEducationController::class, 'create'])->name('education.create');
                    Route::get('{staff}/education/{education}/edit', [StaffEducationController::class, 'edit'])->name('education.edit');

                    Route::resource('experience', ExperienceController::class);
                    Route::get('{staff}/experience', [ExperienceController::class, 'index'])->name('experience.index');
                    Route::get('{staff}/experience/create', [ExperienceController::class, 'create'])->name('experience.create');
                    Route::get('{staff}/experience/{experience}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');

                    Route::resource('staff_activity', StaffActivityController::class);
                    Route::get('{staff}/staff_activity', [StaffActivityController::class, 'index'])->name('staff_activity.index');
                    Route::get('{staff}/staff_activity/create', [StaffActivityController::class, 'create'])->name('staff_activity.create');
                    Route::get('{staff}/staff_activity/{staffActivity}/edit', [StaffActivityController::class, 'edit'])->name('staff_activity.edit');

                    Route::get('{staff}/contact', [ContactController::class, 'staff_contact'])->name('contact.index');
                    Route::get('{staff}/contact/edit', [ContactController::class, 'edit_staff_contact'])->name('contact.edit');
                    Route::post('{staff}/contact', [ContactController::class, 'store_staff_contact'])->name('contact.store');
                    Route::patch('{staff}/contact/{contact}', [ContactController::class, 'update_staff_contact'])->name('contact.update');
                });
                Route::resource('dosen', DosenController::class);
                Route::resource('category-dosen', DosenCategoryController::class);
                Route::prefix('dosen')->name('dosen.')->group(function () {
                    Route::resource('research', ResearchController::class);
                    Route::get('{dosen}/research', [ResearchController::class, 'index'])->name('research.index');
                    Route::get('{dosen}/research/create', [ResearchController::class, 'create'])->name('research.create');
                    Route::get('{dosen}/{research}/edit-research', [ResearchController::class, 'edit'])->name('research.edit');

                    Route::resource('article', ArticleController::class);
                    Route::get('{dosen}/article', [ArticleController::class, 'index'])->name('article.index');
                    Route::get('{dosen}/article/create', [ArticleController::class, 'create'])->name('article.create');
                    Route::get('{dosen}/{article}/edit-article', [ArticleController::class, 'edit'])->name('article.edit');

                    Route::resource('book', BooksController::class);
                    Route::get('{dosen}/book', [BooksController::class, 'index'])->name('book.index');
                    Route::get('{dosen}/book/create', [BooksController::class, 'create'])->name('book.create');
                    Route::get('{dosen}/{book}/edit-book', [BooksController::class, 'edit'])->name('book.edit');

                    Route::resource('funding', FundingController::class);
                    Route::get('{dosen}/funding', [FundingController::class, 'index'])->name('funding.index');
                    Route::get('{dosen}/funding/create', [FundingController::class, 'create'])->name('funding.create');
                    Route::get('{dosen}/{funding}/edit-funding', [FundingController::class, 'edit'])->name('funding.edit');

                    Route::resource('publication', PublicationController::class);
                    Route::get('{dosen}/publication', [PublicationController::class, 'index'])->name('publication.index');
                    Route::get('{dosen}/publication/create', [PublicationController::class, 'create'])->name('publication.create');
                    Route::get('{dosen}/publication/{publication}/edit', [PublicationController::class, 'edit'])->name('publication.edit');

                    Route::resource('studies', StudiesController::class);
                    Route::get('{dosen}/studies', [StudiesController::class, 'index'])->name('studies.index');
                    Route::get('{dosen}/studies/create', [StudiesController::class, 'create'])->name('studies.create');
                    Route::get('{dosen}/studies/{studies}/edit', [StudiesController::class, 'edit'])->name('studies.edit');

                    Route::get('{dosen}/overview', [DosenController::class, 'overview'])->name('overview.index');
                    Route::patch('{dosen}/overview', [DosenController::class, 'edit_overview'])->name('overview.update');

                    Route::get('{dosen}/about', [DosenController::class, 'about'])->name('about.index');
                    Route::patch('{dosen}/about', [DosenController::class, 'edit_about'])->name('about.update');

                    Route::get('{dosen}/ikhtisar', [DosenController::class, 'ikhtisar'])->name('ikhtisar.index');
                    Route::patch('{dosen}/ikhtisar', [DosenController::class, 'edit_ikhtisar'])->name('ikhtisar.update');

                    Route::get('{dosen}/personal', [DosenController::class, 'personal'])->name('personal.index');
                    Route::patch('{dosen}/personal', [DosenController::class, 'edit_personal'])->name('personal.update');

                    Route::get('{dosen}/background', [BackgroundController::class, 'index'])->name('background.index');
                    Route::get('{dosen}/background/edit', [BackgroundController::class, 'edit'])->name('background.edit');
                    Route::post('{dosen}/background', [BackgroundController::class, 'store'])->name('background.store');
                    Route::patch('{dosen}/background/{background}/update', [BackgroundController::class, 'update'])->name('background.update');

                    Route::resource('education', EducationController::class);
                    Route::get('{dosen}/education', [EducationController::class, 'index'])->name('education.index');
                    Route::get('{dosen}/education/create', [EducationController::class, 'create'])->name('education.create');
                    Route::get('{dosen}/education/{education}/edit', [EducationController::class, 'edit'])->name('education.edit');

                    Route::get('{dosen}/contact', [ContactController::class, 'index'])->name('contact.index');
                    Route::get('{dosen}/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
                    Route::post('{dosen}/contact', [ContactController::class, 'store'])->name('contact.store');
                    Route::patch('{dosen}/contact/{contact}', [ContactController::class, 'update'])->name('contact.update');
                });
            });
            Route::prefix('account')->name('account.')->middleware('frole:1')->group(function() {
                Route::resource('dekan', DekanController::class);
                Route::resource('ka-prodi', KAProdiController::class);
                Route::resource('himpunan', HimpunanController::class);
                Route::resource('category-ka-prodi', KAProdiCategoryController::class);
                Route::resource('category-himpunan', HimpunanCategoryController::class);
            });
            Route::prefix('frk')->name('frk.')->middleware('frole:4')->group(function () {
                Route::get('', [FrkController::class, 'index'])->name('index');
                Route::get('check', [FrkController::class, 'check'])->name('check');
                Route::post('check', [FrkController::class, 'checkResult'])->name('check-result');
                Route::get('menu', [FrkController::class, 'menu'])->name('menu');

                Route::resource('teaching', TeachingController::class);
                Route::resource('final-project-advisor', FinalProjectAdvisorController::class);
                Route::resource('final-project-tester', FinalProjectTesterController::class);
                Route::resource('college-leadership-position', CollegeLeadershipPositions::class);

                // OLD ROUTE
                Route::post('education-implementation', [FrkController::class, 'store_edu_impln'])->name('store-education-implementation');
                Route::post('research-implementation', [FrkController::class, 'store_research_impln'])->name('store-research-implementation');
                Route::post('devotion-implementation', [FrkController::class, 'store_devotion_impln'])->name('store-devotion-implementation');
                Route::get('teaching-history', [FrkController::class, 'teaching_data'])->name('teaching.index');
                Route::get('teaching-history/{teaching}/show', [FrkController::class, 'show_teaching'])->name('teaching.show');
                Route::get('final-project-advisor-history', [FrkController::class, 'fpa_data'])->name('fpa.index');
                Route::get('fpa-history/{fpa}/show', [FrkController::class, 'show_fpa'])->name('fpa.show');
                Route::get('final-project-tester-history', [FrkController::class, 'fpt_data'])->name('fpt.index');
                Route::get('fpt-history/{fpt}/show', [FrkController::class, 'show_fpt'])->name('fpt.show');
                Route::get('research-result-history', [FrkController::class, 'research_data'])->name('research-result.index');
                Route::get('research-result-history/{research}/show', [FrkController::class, 'show_research'])->name('research-result.show');
                Route::get('scientific-work-history', [FrkController::class, 'sf_data'])->name('scientific-work.index');
                Route::get('scientific-work-history/{sf}/show', [FrkController::class, 'show_sf'])->name('scientific-work.show');
                Route::get('result-dev-history', [FrkController::class, 'rd_data'])->name('result-dev.index');
                Route::get('result-dev-history/{rd}/show', [FrkController::class, 'show_rd'])->name('result-dev.show');
            });
            Route::prefix('fed')->name('fed.')->middleware('frole:4')->group(function () {
                Route::get('', [FedController::class, 'index'])->name('index');
                Route::get('teaching', [FedController::class, 'teaching_data'])->name('teaching.index');
                Route::get('teaching/{teaching}/edit', [FedController::class, 'edit_teaching'])->name('teaching.edit');
                Route::patch('teaching/{teaching}/update', [FedController::class, 'update_teaching'])->name('teaching.update');
                Route::get('research-result', [FedController::class, 'research_data'])->name('research-result.index');
                Route::get('research-result/{research}/edit', [FedController::class, 'edit_research'])->name('research-result.edit');
                Route::patch('research-result/{research}/update', [FedController::class, 'update_research'])->name('research-result.update');
                Route::get('final-project-advisor', [FedController::class, 'fpa_data'])->name('fpa.index');
                Route::get('final-project-advisor/{fpa}/edit', [FedController::class, 'edit_fpa'])->name('fpa.edit');
                Route::patch('final-project-advisor/{fpa}/update', [FedController::class, 'update_fpa'])->name('fpa.update');
                Route::get('final-project-tester', [FedController::class, 'fpt_data'])->name('fpt.index');
                Route::get('final-project-tester/{fpt}/edit', [FedController::class, 'edit_fpt'])->name('fpt.edit');
                Route::patch('final-project-tester/{fpt}/update', [FedController::class, 'update_fpt'])->name('fpt.update');
                Route::get('scientific-work', [FedController::class, 'sf_data'])->name('scientific-work.index');
                Route::get('scientific-work/{sf}/edit', [FedController::class, 'edit_sf'])->name('scientific-work.edit');
                Route::patch('scientific-work/{sf}/update', [FedController::class, 'update_sf'])->name('scientific-work.update');
                Route::get('result-dev', [FedController::class, 'rd_data'])->name('result-dev.index');
                Route::get('result-dev/{rd}/edit', [FedController::class, 'edit_rd'])->name('result-dev.edit');
                Route::patch('result-dev/{rd}/update', [FedController::class, 'update_rd'])->name('result-dev.update');
            });
            Route::prefix('dekan')->name('dekan.')->middleware('frole:2')->group(function () {
                Route::get('request-list', [OfficeDekanController::class, 'index'])->name('index');
                Route::get('teaching', [OfficeDekanController::class, 'teaching_data'])->name('teaching.index');
                Route::get('teaching/{teaching}/edit', [OfficeDekanController::class, 'edit_teaching'])->name('teaching.edit');
                Route::patch('teaching/{teaching}/update', [OfficeDekanController::class, 'update_teaching'])->name('teaching.update');
                Route::get('research-result', [OfficeDekanController::class, 'research_data'])->name('research-result.index');
                Route::get('research-result/{research}/edit', [OfficeDekanController::class, 'edit_research'])->name('research-result.edit');
                Route::patch('research-result/{research}/update', [OfficeDekanController::class, 'update_research'])->name('research-result.update');
                Route::get('final-project-advisor', [OfficeDekanController::class, 'fpa_data'])->name('fpa.index');
                Route::get('final-project-advisor/{fpa}/edit', [OfficeDekanController::class, 'edit_fpa'])->name('fpa.edit');
                Route::patch('final-project-advisor/{fpa}/update', [OfficeDekanController::class, 'update_fpa'])->name('fpa.update');
                Route::get('final-project-tester', [OfficeDekanController::class, 'fpt_data'])->name('fpt.index');
                Route::get('final-project-tester/{fpt}/edit', [OfficeDekanController::class, 'edit_fpt'])->name('fpt.edit');
                Route::patch('final-project-tester/{fpt}/update', [OfficeDekanController::class, 'update_fpt'])->name('fpt.update');
                Route::get('scientific-work', [OfficeDekanController::class, 'sf_data'])->name('scientific-work.index');
                Route::get('scientific-work/{sf}/edit', [OfficeDekanController::class, 'edit_sf'])->name('scientific-work.edit');
                Route::patch('scientific-work/{sf}/update', [OfficeDekanController::class, 'update_sf'])->name('scientific-work.update');
                Route::get('result-dev', [OfficeDekanController::class, 'rd_data'])->name('result-dev.index');
                Route::get('result-dev/{rd}/edit', [OfficeDekanController::class, 'edit_rd'])->name('result-dev.edit');
                Route::patch('result-dev/{rd}/update', [OfficeDekanController::class, 'update_rd'])->name('result-dev.update');
            });
            Route::prefix('kaprodi')->name('kaprodi.')->middleware('frole:3')->group(function () {
                Route::get('request-list', [OfficeKAProdiController::class, 'index'])->name('index');
                Route::get('teaching', [OfficeKAProdiController::class, 'teaching_data'])->name('teaching.index');
                Route::get('teaching/{teaching}/edit', [OfficeKAProdiController::class, 'edit_teaching'])->name('teaching.edit');
                Route::patch('teaching/{teaching}/update', [OfficeKAProdiController::class, 'update_teaching'])->name('teaching.update');
                Route::get('research-result', [OfficeKAProdiController::class, 'research_data'])->name('research-result.index');
                Route::get('research-result/{research}/edit', [OfficeKAProdiController::class, 'edit_research'])->name('research-result.edit');
                Route::patch('research-result/{research}/update', [OfficeKAProdiController::class, 'update_research'])->name('research-result.update');
                Route::get('final-project-advisor', [OfficeKAProdiController::class, 'fpa_data'])->name('fpa.index');
                Route::get('final-project-advisor/{fpa}/edit', [OfficeKAProdiController::class, 'edit_fpa'])->name('fpa.edit');
                Route::patch('final-project-advisor/{fpa}/update', [OfficeKAProdiController::class, 'update_fpa'])->name('fpa.update');
                Route::get('final-project-tester', [OfficeKAProdiController::class, 'fpt_data'])->name('fpt.index');
                Route::get('final-project-tester/{fpt}/edit', [OfficeKAProdiController::class, 'edit_fpt'])->name('fpt.edit');
                Route::patch('final-project-tester/{fpt}/update', [OfficeKAProdiController::class, 'update_fpt'])->name('fpt.update');
                Route::get('scientific-work', [OfficeKAProdiController::class, 'sf_data'])->name('scientific-work.index');
                Route::get('scientific-work/{sf}/edit', [OfficeKAProdiController::class, 'edit_sf'])->name('scientific-work.edit');
                Route::patch('scientific-work/{sf}/update', [OfficeKAProdiController::class, 'update_sf'])->name('scientific-work.update');
                Route::get('result-dev', [OfficeKAProdiController::class, 'rd_data'])->name('result-dev.index');
                Route::get('result-dev/{rd}/edit', [OfficeKAProdiController::class, 'edit_rd'])->name('result-dev.edit');
                Route::patch('result-dev/{rd}/update', [OfficeKAProdiController::class, 'update_rd'])->name('result-dev.update');
            });
            Route::prefix('timeline')->name('timeline.')->middleware('frole:1')->group(function () {
                Route::resource('activity', ActivityController::class);
                Route::resource('news', NewsController::class);
            });
            Route::prefix('appearance')->name('appearance.')->middleware('frole:1')->group(function () {
                Route::resource('carousel', CarouselController::class);
                Route::get('breaking-news-section', [HomeMenuController::class, 'breaking_news_sections'])->name('breaking-news-section.index');
                Route::patch('breaking-news-section/update', [HomeMenuController::class, 'breaking_news_sections_update'])->name('breaking-news-section.update');
                Route::get('civitas-section', [HomeMenuController::class, 'civitas_section'])->name('civitas-section.index');
                Route::patch('civitas-section/update', [HomeMenuController::class, 'civitas_section_update'])->name('civitas-section.update');
                Route::get('faculty-explore-section', [HomeMenuController::class, 'faculty_explore_section'])->name('faculty-explore-section.index');
                Route::patch('faculty-explore-section/update', [HomeMenuController::class, 'faculty_explore_section_update'])->name('faculty-explore-section.update');
                Route::get('faculty-items-section', [HomeMenuController::class, 'faculty_items_section'])->name('faculty-items-section.index');
                Route::get('faculty-items-section/create', [HomeMenuController::class, 'faculty_items_section_create'])->name('faculty-items-section.create');
                Route::post('faculty-items-section/store', [HomeMenuController::class, 'faculty_items_section_store'])->name('faculty-items-section.store');
                Route::get('faculty-items-section/{fis}/edit', [HomeMenuController::class, 'faculty_items_section_edit'])->name('faculty-items-section.edit');
                Route::patch('faculty-items-section/{fis}/update', [HomeMenuController::class, 'faculty_items_section_update'])->name('faculty-items-section.update');
                Route::get('study-program-section', [HomeMenuController::class, 'study_program_section'])->name('study-program-section.index');
                Route::patch('study-program-section/update', [HomeMenuController::class, 'study_program_section_update'])->name('study-program-section.update');
                Route::get('meet-our-students-section', [HomeMenuController::class, 'meet_our_students_section'])->name('meet-our-students-section.index');
                Route::patch('meet-our-students-section/update', [HomeMenuController::class, 'meet_our_students_section_update'])->name('meet-our-students-section.update');
                Route::resource('web-footer', FooterController::class);
            });
            Route::prefix('setting')->name('setting.')->middleware('frole:1')->group(function () {
                // Route::resource('config', ConfigController::class);
                // Route::resource('permission', PermissionController::class);
                Route::resource('role', RoleController::class);
                Route::get('logo', [LogoController::class, 'index'])->name('logo.index');
                Route::patch('logo/update', [LogoController::class, 'update'])->name('logo.update');
            });
            Route::resource('subject', SubjectController::class)->middleware('frole:1');
            Route::resource('tested-component', TestedComponentController::class)->middleware('frole:1');
            Route::resource('tester-position', TesterPositionController::class)->middleware('frole:1');
            Route::resource('category-prodi', CategoryProdiController::class)->middleware('frole:1');
            Route::resource('comment', CommentController::class)->middleware('frole:1');
            Route::resource('program-studi', ProgramStudiController::class)->middleware('frole:1');
            Route::get('logout', [AuthController::class, 'do_logout'])->name('auth.logout');
        });
    });
});
