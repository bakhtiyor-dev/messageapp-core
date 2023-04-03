Run <code>./vendor/bin/phpunit ./tests</code>

### Done based following task:

<p>You need to code core structure for messaging app.</p>
<p>This message app have 3 different user types: <strong>Student</strong>, <strong>Teacher</strong> and
    <strong>Parent</strong></p>
<hr>
<p>Each user type should have follow:</p>
<ol>
    <li>User ID (required)</li>
    <li>First name (required)</li>
    <li>Last name (required)</li>
    <li>Email (required)</li>
    <li>Profile Photo (optional)</li>
</ol>
<p>Difference between user types:</p>
<ol>
    <li><strong>Teachers</strong> and <strong>Parents</strong> have <strong>Salutation (optional)</strong>, it's used in full
        name.
    </li>
    <li><strong>Teacher</strong> can send message to any user type</li>
    <li><strong>Parent</strong> and <strong>Student</strong> can send message only to <strong>Teachers</strong></li>
</ol>
<p>After initialising user object we need to have following options:</p>
<ol>
    <li>User object need to have option to get <strong>full name</strong>.<br>
        For <strong>Students</strong> full name is combined from: <strong>first name</strong> + <strong>last
            name</strong>.<br>
        For <strong>Teachers</strong> and <strong>Parents</strong> is built from:
        <strong>salutation</strong> + <strong>first name</strong> + <strong>last name</strong>.
    </li>
    <li>We need a way to get profile picture. If we don't set profile picture on initialising user object, we need to
        have
        option to get path/url to default system avatar.
    </li>
    <li>
        Get email
    </li>
    <li>
        Get user id.
    </li>
    <li>We need option to save user. On save we need to validate <strong>email</strong> and
        <strong>profile picture</strong>.
        For <strong>profile picture</strong> as this is only test, do not make complex validation, instead check
        does passed string have <i>.jpg</i> in file name, if not <strong>save</strong> should fail.<br>
        Also, this <strong>save</strong> feature does not need to actually save user, instead it should only return
        success if validation passed, and fail if not.
    </li>
</ol>
<hr>
<p>Each message need to have (all required):</p>
<ol>
    <li>Sender</li>
    <li>Receiver</li>
    <li>Message text</li>
    <li>Creation time (Unix time format)</li>
    <li>Message type: <strong>System</strong> or <strong>Manual</strong></li>
</ol>
<p>For each message we want to have following features</p>
<ol>
    <li><strong>System</strong> message can only send <strong>Teacher</strong> and only to <strong>Students</strong>.</li>
    <li>Option to get full name of sender and receiver</li>
    <li>Option to get message text</li>
    <li>Option to get message type</li>
    <li>Formatted creation time</li>
    <li>Option to <strong>save</strong> message. Same as for saving user, we don't need actual saving, 
        we just need validation.<br>
        For example, if we create new message instance and we set <strong>Student</strong> as sender,
        but we also set message type to <strong>System</strong>,
        <strong>save</strong> message should fail as <strong>Teacher</strong> can only send <strong>System</strong> messages.
    </li>
</ol>
