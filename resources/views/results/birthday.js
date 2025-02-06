const birthMonth = 2;
const birthDay = 5;

// Get today's date
const today = new Date();
const currentMonth = today.getMonth() + 1;

// Check if today is your birthday
if (currentMonth === birthMonth
    && currentDay === birthDay) {
    alert("Happy Birthday Lawrence! 🎉🎂🥳");
} else {
    alert("It's not your birthday today.");
}
