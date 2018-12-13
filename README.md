[IMPORTANT!]CLONING GUIDE
===========================================
Site uses XAMPP.
Create a Database named 'userbase' with user 'root' and no password (ie default settings).
Then add the following tables:

    1. profile
    |- Id : int Primary Key Auto Increment
    |- username: text
    |- pwd: text
    |- name: text

    2. post
    |- Id: int Primary Key Auto Increment
    |- origin: text
    |- created: text
    |- link: text

    3. active
    |- Id: int Primary Key Auto Increment
    |- username: text
    |- ip: text
    |- intime: bigint

Then clone normally and run using XAMPP.

PUSHING ADVICE
===========================================
Please write elaborately in your commits. If you do a major change or a new feature update please mention that in Changelog.
While writing in Changelog, please crealy mention your name, change-date and give an id to your change. Mention the same id in your commit message.

TO-DO LIST
===========================================
    1. Improve the CSS.
    2. Add Like/Dislike and Comment features.
    3. Make provision for post editing so that use of raw html in the posts can be disabled.
    4. Improve the security of the site.
    5. Make provision for addition of profile-photo or avatar.
    6. Make provision for AJAX update of feed.
