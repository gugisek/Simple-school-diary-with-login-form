        function clock() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            var dayOfWeek = date.getDay();
            var dayOfWeekText = "";
            switch (dayOfWeek) {
                case 0:
                    dayOfWeekText = "Niedziela";
                    break;
                case 1:
                    dayOfWeekText = "Poniedziałek";
                    break;
                case 2:
                    dayOfWeekText = "Wtorek";
                    break;
                case 3:
                    dayOfWeekText = "Środa";
                    break;
                case 4:
                    dayOfWeekText = "Czwartek";
                    break;
                case 5:
                    dayOfWeekText = "Piątek";
                    break;
                case 6:
                    dayOfWeekText = "Sobota";
                    break;
            }
            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            if (day < 10) {
                day = "0" + day;
            }
            if (month < 10) {
                month = "0" + month;
            }
            document.getElementById("zegar").innerHTML = hours + ":" + minutes + ":" + seconds + " " + dayOfWeekText + " " + day + "." + month + "." + year;
            setTimeout(clock, 1000);
        }
    