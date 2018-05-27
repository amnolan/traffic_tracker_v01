# traffic_tracker
PHP traffic tracker. It simply records the time, IP address and referrer to a file.

The purpose of this traffic tracker is just to create a simple collection of log files for you to glean data about IPs and
what times and dates you are receiving the most traffic. It is very simple in nature and will work on any server running
Apache with PHP support.

To use, include this file in the page or pages that you would like to track IP hits on. It has only been tested on a single page app so far, so it is possible that it may not work across multiple pages (if several requests to open the same file are being made simultaneously).

According to [this posting](https://stackoverflow.com/questions/3832646/what-happens-in-nfs-if-2-or-more-servers-try-to-write-the-same-file-simultaneous "this posting"), normally you would not have two requesters requesting at the same time one requestor will get an exception (and thus it wouldn't record that visit). However nanosecond collisions are extremely unlikely to happen. A later update may just spin up a small SQL database to handle this possible issue altogether as dbs will always lock and manage threads by default.

Another plan is to have a UI display and a true hit counter which displays an integer for visits.

To use simply include tracker.php.

    include 'tracker.php';
