document.addEventListener('DOMContentLoaded', (event) => {
    const today = new Date();

    const tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);

    const threeMonthsFromTomorrow = new Date();
    threeMonthsFromTomorrow.setMonth(tomorrow.getMonth() + 3);

    const tomorrowISO = tomorrow.toISOString().split('T')[0];
    const threeMonthsFromTomorrowISO = threeMonthsFromTomorrow.toISOString().split('T')[0];

    const inputDateFrom = document.querySelector("#date_from");
    const inputDateTo = document.querySelector("#date_to")
    inputDateFrom.min = tomorrowISO;
    inputDateFrom.max = threeMonthsFromTomorrowISO;
    inputDateTo.min = tomorrowISO;
    inputDateTo.max = threeMonthsFromTomorrowISO
});
