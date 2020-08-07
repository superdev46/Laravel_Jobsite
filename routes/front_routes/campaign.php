<?php
Route::get('campaign/{slug}', 'Campaign\CampaignController@campaignDetail')->name('campaign.detail');

Route::get('pledge/{slug}', 'Campaign\CampaignController@applyCampaign')->name('pledge.campaign');
Route::post('pledge/{slug}', 'Campaign\CampaignController@postApplyCampaign')->name('post.pledge.campaign');

Route::get('campaigns', 'Campaign\CampaignController@campaignsBySearch')->name('campaign.list');

Route::get('add-to-favourite-job/{job_slug}', 'Job\JobController@addToFavouriteJob')->name('add.to.favourite');
Route::get('remove-from-favourite-job/{job_slug}', 'Job\JobController@removeFromFavouriteJob')->name('remove.from.favourite');
Route::get('my-job-applications', 'Job\JobController@myJobApplications')->name('my.job.applications');
Route::get('my-favourite-jobs', 'Job\JobController@myFavouriteJobs')->name('my.favourite.jobs');


Route::get('post-campaign', 'Campaign\CampaignPublishController@createFrontCampaign')->name('post.campaign');


Route::post('store-front-campaign', 'Campaign\CampaignPublishController@storeFrontCampaign')->name('store.front.campaign');
Route::get('edit-campaign/{id}', 'Campaign\CampaignPublishController@editFrontCampaign')->name('edit.front.campaign');
Route::put('update-front-campaign/{id}', 'Campaign\CampaignPublishController@updateFrontCampaign')->name('update.front.campaign');
Route::delete('delete-front-job', 'Job\JobPublishController@deleteJob')->name('delete.front.job');

Route::get('job-seekers', 'Job\JobSeekerController@jobSeekersBySearch')->name('job.seeker.list');