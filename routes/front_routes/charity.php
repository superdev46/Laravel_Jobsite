<?php
Route::get('charity-home', 'Charity\CharityController@index')->name('charity.home');

Route::put('update-charity-profile', 'Charity\CharityController@updatecharityProfile')->name('update.charity.profile');
Route::get('posted-jobs', 'Charity\CharityController@postedJobs')->name('posted.jobs');

Route::post('contact-charity-message-send', 'Charity\CharityController@sendContactForm')->name('contact.charity.message.send');
Route::post('contact-applicant-message-send', 'Charity\CharityController@sendApplicantContactForm')->name('contact.applicant.message.send');
Route::get('list-applied-users/{job_id}', 'Charity\CharityController@listAppliedUsers')->name('list.applied.users');
Route::get('list-favourite-applied-users/{job_id}', 'Charity\CharityController@listFavouriteAppliedUsers')->name('list.favourite.applied.users');
Route::get('add-to-favourite-applicant/{application_id}/{user_id}/{job_id}/{charity_id}', 'Charity\CharityController@addToFavouriteApplicant')->name('add.to.favourite.applicant');
Route::get('remove-from-favourite-applicant/{application_id}/{user_id}/{job_id}/{charity_id}', 'Charity\CharityController@removeFromFavouriteApplicant')->name('remove.from.favourite.applicant');
Route::get('applicant-profile/{application_id}', 'Charity\CharityController@applicantProfile')->name('applicant.profile');
Route::get('user-profile/{id}', 'Charity\CharityController@userProfile')->name('user.profile');
Route::get('charity-followers', 'Charity\CharityController@charityFollowers')->name('charity.followers');
Route::get('charity-messages', 'Charity\CharityController@charityMessages')->name('charity.messages');
Route::get('charity-message-detail/{id}', 'Charity\CharityController@charityMessageDetail')->name('charity.message.detail');

// ***************************************   Route Customiztion   ******************************************
Route::get('charity/profile', 'Charity\CharityController@charityProfile')->name('charity.profile');
Route::get('charity/donors', 'Charity\CharityController@findDonors')->name('charity.donors');
Route::get('charity/donor-profile/{id}', 'Charity\CharityController@donorProfile')->name('charity.donor.profile');
Route::get('charity/{slug}/detail', 'Charity\CharityController@charityDetail')->name('charity.detail');
Route::get('charity/dashboard', 'Charity\CharityController@dashboard')->name('charity.dashboard');

