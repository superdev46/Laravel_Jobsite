<?php
Route::get('job/{slug}', 'Job\JobController@jobDetail')->name('job.detail');
Route::get('apply/{slug}', 'Job\JobController@applyJob')->name('apply.job');
Route::get('jobs', 'Job\JobController@jobsBySearch')->name('job.list');
Route::get('add-to-favourite-job/{job_slug}', 'Job\JobController@addToFavouriteJob')->name('add.to.favourite');
Route::get('remove-from-favourite-job/{job_slug}', 'Job\JobController@removeFromFavouriteJob')->name('remove.from.favourite');
Route::get('my-job-applications', 'Job\JobController@myJobApplications')->name('my.job.applications');
Route::get('my-favourite-jobs', 'Job\JobController@myFavouriteJobs')->name('my.favourite.jobs');
Route::get('edit-front-job/{id}', 'Job\JobPublishController@editFrontJob')->name('edit.job');
Route::put('update-front-job/{id}', 'Job\JobPublishController@updateFrontJob')->name('update.front.job');
Route::delete('delete-front-job', 'Job\JobPublishController@deleteJob')->name('delete.front.job');

Route::get('job-seekers', 'Job\JobSeekerController@jobSeekersBySearch')->name('job.seeker.list');

// --------------------------------------
Route::get('edit-project/{id}', 'Job\JobPublishController@editFrontProject')->name('edit.front.project');
Route::put('update-project/{id}', 'Job\JobPublishController@updateFrontJob')->name('update.front.project');
Route::get('post-project', 'Job\JobPublishController@createFrontProject')->name('post.project');
Route::post('store-project', 'Job\JobPublishController@storeFrontProject')->name('store.front.project');
Route::get('projects', 'Job\JobController@projectsBySearch')->name('project.list');
Route::post('project-apply/{slug}', 'Job\JobController@postApplyProject')->name('post.apply.project');