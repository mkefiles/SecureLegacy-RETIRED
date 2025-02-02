        <!-- SECTION: Contact -->
        <section class="contact">
            <div class="jumbotron jumbotron__contact">
                <h1>Get In Touch</h1>
            </div>
            <div class="content">
                <h2>Contact Us</h2>
                <p>
                    Please fill out the contact form below and we will get back to you within 24 hours.
                </p>
                <form class="contact_form" action="/thank-you.php" method="POST">
                    <div class="contact_form__input">
                        <label for="full_name">Name</label>
                        <input type="text" name="lead_name" id="full_name" placeholder="John Doe" pattern="[A-Za-z\s]+" minlength="2" maxlength="45" required>
                        <span id="error_name">Invalid entry. Please use valid characters only (A through Z and spaces).</span>
                    </div>
    
                    <div class="contact_form__input">
                        <label for="email_address">Email</label>
                        <input type="email" name="lead_email" id="email_address" placeholder="john.doe@email.com" maxlength="45" required>
                        <span id="error_email">Invalid entry. Please check email address for accuracy.</span>
                    </div>
    
                    <div class="contact_form__input">
                        <label for="phone_number">Phone</label>
                        <input type="text" name="lead_phone" id="phone_number" placeholder="555-555-0101" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" required>
                        <span id="error_phone">Invalid entry. Please use format: 555-555-0101</span>
                    </div>
    
                    <div class="contact_form__input">
                        <label for="message_input">Message</label>
                        <textarea name="lead_message" id="message_input" cols="30" rows="10" placeholder="I want to learn more about protecting my family." required></textarea>
                        <span id="error_message">Invalid entry. Please provide desired message.</span>
                    </div>
                    <button type="submit" class="btn formBtn" id="form_button">Send Email</button>
                </form>
            </div>
        </section>