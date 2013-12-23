p4.harvardextension.biz
=======================

Project 4 for CSCI E-15: Woof Gaming


DESCRIPTION OF THE APPLICATION

For my final project in this class, I thought about the different options that Professor Buck described in her opening remarks for Lecture 13. Eventually, I decided to follow a modified version of the possibility of extending the functionality of assignment 2 or 3: I decided to extend for both, as well as integrate the different code modules together.

What I wanted to accomplish was to gain experience integrating disparate code modules built in different languages together, which often have tricky issues such as logical conflicts and shared variable/function/file names (which I have spent many hours struggling with and ultimately resolving). To be frank, I did consider the safer route of only extending 1 of project 2 or 3 which would have been substantially less work, but I specifically chose this class in August because I wanted a very challenging educational experience: it made sense for me to extend that learning philosophy to the final project as well.

I have also taken very specific care to look at all mark deductions in projects 2 and 3, and fix all of those to the best of my ability. While I unfortunately do not have every operating system + browser version combination at my disposal, I have tested thoroughly and am satisied that all previous causes for deduction have been resolved.


LIST OF FEATURES

The following is also described on the main page of the app, but here is what has been added exclusively for project 4:

- Game: Added more songs and characters to choose from
- Game: Streamlined selection list (different Bootstrap element) + fade out animation (jQuery)
- Game: New health bar graphic and animation, which decreases after each incorrect guess + changes colour based on threshold
- Game: Leaderboards! This consists of tracking more data (SQL), updating the stats after each game session and creating a leaderboard page to display collated results (PHP)
- User Experience: User is automatically signed in after a successful signup, cookie is created during user creation process
- User Experience: User can change password, requires authentication against current password
- Validation: jQuery validation of all forms including sign up, login and post
- Validation: User cannot post a blank message, checked with server side validation


ASPECTS MANAGED BY JAVASCRIPT

For the purposes of this readme file, I will also include any jQuery elements under this heading as well. The following aspects are all handled by native JavaScript or jQuery:

- Game: Generation of the HTML5 audio player element with a randomly selected song
- Game: Validation of both correct and incorrect selections of game characters
- Game: Animation of incorrect selections (sliding out of view)
- Game: Updating of score (health meter), both for remaining health length and color (Twitter Bootstrap style class)
- Validation: For login, signing in and posting, any fields left empty will highlight in red and a context sensitive message will describe the expected input


ANY ADDITIONAL INFORMATION

In terms of using the app, the above should be pretty comprehensive. Signing up for an account should be as reliable as ever.

On a personal note, I want to thank all of the teaching staff of CSCI E-15 this semester for a worthwhile and challenging experience: to Alain, Cruz, Dan, Johanna, Quintin, Xin and Professor Buck, I want to express how appreciative I am for a semester that I found very challenging (I hadn't written a line of code in a decade before this semester) and immediately relevant to my professional career.

I can state that the ability to read and understand modern web application technologies that I gained from CSCI E-15 were crucial in my organization's ability to launch one of the first Xbox One applications in the world, and the 1st post-launch application in all of Canada in the Rogers AnyPlace TV application (http://www.xbox.com/en-CA/Live/apps/xbox-one/raptv/home). I was really hands-on with this project, and the ability to track down and determine the root cause of various technical and customer experience issues that I leanred with all of you was invaluable in attaining Microsoft certification and launching in 2013.

Thanks again for everything, and I hope to see you around! :)

- Edward