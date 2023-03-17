![image](https://user-images.githubusercontent.com/68809636/224562326-bab040f7-2c2c-447c-a9dc-2fcc8b6134a6.png)

# Back End Development Final Project

The Back End Engineering project aimed to build an API for a job posting platform that will
enable users to create job postings, edit and update them, and perform other related tasks.

This API was designed to handle all the job details, including the job name, description,
requirements, salary, location, and any other details. The system will be built using the Laravel framework.

## The system will have the following features:

### Job Creation API:
The system has an API that allows users to create new job
postings. This API requires authentication and accept inputs such as job name, location,
salary, job description, and other relevant information.

    Route::post('/jobs', [JobController::class, 'store']);

    This endpoint will receive a POST request with the job details in the request body. The store method will create a new job posting and return the job details.

    Route::get('/jobs', [JobController::class, 'index']);

    This endpoint will receive a GET request without any parameters. The index method will retrieve all job postings and return them.

### Job Update API: 
The system allows users to update their job postings through an API.
This API will require authentication and allow users to modify job details such as job
description, salary, job location, and other relevant information.

    Route::put('/jobs/{id}', [JobController::class, 'update']);

    This endpoint will receive a PUT request with the job ID in the URL and the updated job details in the request body. The update method will update the job posting details and return them.

### Job Deletion API: 
The system allows users to delete their job postings through an API.
This API will require authentication and will remove the job posting from the platform. 

    Route::delete('/jobs/{id}', [JobController::class, 'destroy']);

    This endpoint will receive a DELETE request with the job ID in the URL. The destroy method will delete the job posting and return a success message.

### Job Search API:
The system has an API that allows users to search for job postings
based on specific criteria such as job title, location, or company name.

    Route::get('/jobs/search', [JobController::class, 'search']);

    This endpoint will receive a GET request with the search parameters in the query string. The search method will search for job postings based on the search parameters and return the matching job postings.

    Route::get('/jobs/{id}', [JobController::class, 'shpw']);

    This endpoint will receive a GET request with the job ID in the URL. The show method will retrieve the job posting details and return them.

### Job Filtering API:
The system has an API that allows users to filter job postings
based on specific criteria such as job category, salary range, or job type.

    Route::get('/jobs/{id}', [JobController::class, 'filter]);

    Once all the filters have been applied, we use the get method to retrieve the filtered jobs, and then return them as a JSON response.

### User Authentication and Authorization:
The APIs was secured using laravel’s in-built
authentication and authorization mechanism. Users are being authorized before creating,updating or deleting job postings.

    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/login', [AuthController::class, 'login']);

    The above both endpoints copuled with a middleware was used to protect the creating,updating or deleting job postings endpoints

### Database:
MySQL database was used to store job postings and other related information
