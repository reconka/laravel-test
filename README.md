# Coding Test

This is the Laravel coding test to access your skills and thought process when coming to build features in an application.


## Expectation

Using the project provided we want you to integrate with a 3rd party API to pull in user data.

We want this to be maintainable and flexible to potentially add other API calls to the future.
This code might also be used in other parts of the application to get a fresh set of the data from the API.

There's a few pointers we would suggest to think about when coming up with your solutions:


## Task

Build a command that pulls data from an API and stores it against the User model.

- Call the [https://reqres.in/] API to pull in the first page of users only.

We could potentially use this command in a schedule to repeatedly update the users from the API.
