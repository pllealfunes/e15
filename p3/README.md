# Project 3
+ By: Paula Leal Funes
+ Production URL: http://e15p3.lefthandedcat.me/

## Feature summary
*Outline a summary of features that your application has. The following details are from a hypothetical project called "Movie Tracker". Note that it is similar to Bookmark, yet it has its own unique features. Delete this example and replace with your own feature summary*

+ Visitors can register/log in
+ Only Users with accounts can create and delete posts and comments
+ There's a file uploader that's used to upload poster images for each movie
+ User's can toggle whether movies in their collection are public or private
+ Each user has a public profile page which presents a short bio about their movie tastes, as well as a list of public movies in their collection
+ Each user has their own account page where they can edit their bio, email, password
+ Users can clone movies from another user's public collection into their collection
+ The home page features
  + shows a list of posts from descending order
  + a list of categories, with a link to each category that shows a page of movies (with links) within that category

  
## Database summary
*Describe the tables and relationships used in your database. Delete the examples below and replace with your own info.*

+ My application has 3 tables in total (`users`, `posts`, `comments`)
+ There's a many-to-many relationship between `users` and `posts`
+ There's a many-to-many relationship between `users` and `comments`
+ There's a one-to-many relationship between `posts` and `comments`

## Outside resources
* https://stackoverflow.com/questions/49323458/can-detach-method-also-be-applied-to-one-to-many-relationship-in-laravel


## Tests
*Include the full output of running `codecept run acceptance --steps`. If you’re taking this course for undergraduate credit and are opting out from testing, simply put "undergraduate - opting out" in this section*