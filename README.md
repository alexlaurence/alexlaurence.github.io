# alexlaurence.github.io
🏠My home page

## Contact form

The contact form posts to `php/mailsender.php`. To keep the destination email
address private, set the environment variable `CONTACT_EMAIL` on your server to
the address that should receive submitted messages (for example
`alexanderadam.laurence@gmail.com`). When the form is submitted a short
confirmation message is displayed on the page if the email was accepted.

The mail script requires PHP to be installed on the host machine. On systems
without the `php` binary, commands such as `php -l php/mailsender.php` will
fail with *command not found*. Install PHP or use a hosting provider that
supports PHP in order to handle form submissions.
