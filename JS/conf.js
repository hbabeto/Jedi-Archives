document.addEventListener("DOMContentLoaded", () => {
    const profilePicForm = document.getElementById('profile-pic-form');
    const userInfoForm = document.getElementById('user-info-form');

    profilePicForm.addEventListener('submit', (event) => {
        event.preventDefault();
        alert('Profile picture saved successfully!');
    });

    userInfoForm.addEventListener('submit', (event) => {
        event.preventDefault();
        alert('User information saved successfully!');
    });
});
