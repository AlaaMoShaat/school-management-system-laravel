<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository');

        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository');

        $this->app->bind(
            'App\Repository\PromotionRepositoryInterface',
            'App\Repository\PromotionRepository');

        $this->app->bind(
            'App\Repository\FeeRepositoryInterface',
            'App\Repository\FeeRepository');

        $this->app->bind(
            'App\Repository\FeeInvoiceRepositoryInterface',
            'App\Repository\FeeInvoiceRepository');

        $this->app->bind(
            'App\Repository\GraduationRepositoryInterface',
            'App\Repository\GraduationRepository');

        $this->app->bind(
            'App\Repository\ReceiptStudentRepositoryInterface',
            'App\Repository\ReceiptStudentRepository');

        $this->app->bind(
            'App\Repository\ProcessingFeeRepositoryInterface',
            'App\Repository\ProcessingFeeRepository');

        $this->app->bind(
            'App\Repository\PaymentStudentRepositoryInterface',
            'App\Repository\PaymentStudentRepository');

        $this->app->bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository');

        $this->app->bind(
            'App\Repository\LibraryRepositoryInterface',
            'App\Repository\LibraryRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

   }
}