<!-- Help and FAQ Section -->
<section class="faq-section container">
    <h2>Help & Frequently Asked Questions</h2>
    <div class="faq-container">
        <div class="faq-item">
            <h3 class="faq-question">What is the purpose of this website?</h3>
            <p class="faq-answer">Our website provides a platform for users to manage and track their inventory efficiently, ensuring they have access to the resources they need.</p>
        </div>
        <div class="faq-item">
            <h3 class="faq-question">How can I create an account?</h3>
            <p class="faq-answer">To create an account, click on the 'Sign Up' button on the homepage and follow the prompts to register your information.</p>
        </div>
        <div class="faq-item">
            <h3 class="faq-question">What should I do if I forget my password?</h3>
            <p class="faq-answer">If you forget your password, click on the 'Forgot Password?' link on the login page to receive instructions for resetting it.</p>
        </div>
        <div class="faq-item">
            <h3 class="faq-question">How do I contact customer support?</h3>
            <p class="faq-answer">You can contact our customer support team by emailing support@example.com or using the contact form on our website.</p>
        </div>
        <div class="faq-item">
            <h3 class="faq-question">Can I change my account details?</h3>
            <p class="faq-answer">Yes, you can change your account details by navigating to the 'Account Settings' section after logging in.</p>
        </div>
    </div>
</section>

<style>
	.faq-section {
    padding: 50px 0;
    background-color: #f9f9f9; /* Light background for contrast */
}

.faq-section h2 {
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 30px;
}

.faq-container {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 15px;
    padding: 20px;
    transition: background-color 0.3s;
}

.faq-item:hover {
    background-color: #f1f1f1; /* Slightly darker on hover */
}

.faq-question {
    font-weight: bold;
    font-size: 1.2em;
    cursor: pointer;
}

.faq-answer {
    display: none; /* Hidden by default */
    margin-top: 10px;
    color: #555;
}

.faq-item.active .faq-answer {
    display: block; /* Show when active */
}

</style>

<script>
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        faqItem.classList.toggle('active');
    });
});
</script>
