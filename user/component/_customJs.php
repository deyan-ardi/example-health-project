  <script>
      const empty = (element) => {
          element.innerHTML = "";
      };


      const selectReason = (value) => {
          const option1 = `Childhood vaccines: A disclaimer that multiple vaccines are normally
administered in combination and may cause the child to be sluggish
or feverous for 24 – 48 hours afterwards.`;

          const option2 = `Influenza: The best time to get vaccinated is in April and May each
year for optimal protection over the winter months.`

          const option3 = `Covid Booster Shot: Advice that everyone should arrange to have
their third shot as soon as possible and adults over the age of 30
should have their fourth shot to protect against new variant strains.`

          const option4 = `Blood test: That some tests require some fasting ahead of time and
that a staff member will advise them on this prior to the
appointment.`
          const desc = document.getElementById('reason-desc');
          empty(desc);
          if (value === "Childhood Vaccination Shots") {
              desc.innerHTML = option1;
          } else if (value === "Influenza Shot") {
              desc.innerHTML = option2;
          } else if (value === "Covid Booster Shot") {
              desc.innerHTML = option3;
          } else if (value === "Blood Test") {
              desc.innerHTML = option4;
          } else {
              empty(desc);
          }
      };

      const client_validation = () => {
          var first_name =
              document.getElementById('first_name');
          var last_name =
              document.getElementById('last_name');
          var date =
              document.getElementById('date');
          var time =
              document.getElementById('booking_time');
          var reason =
              document.getElementById('reason');
          var regName = /\d+$/g; // Javascript reGex for Name validation
          var regDate = /^\d{2}[./-]\d{2}[./-]\d{4}$/;
   
          if (first_name.value == "" || regName.test(first_name.value)) {
              document.getElementById('first-name-danger').innerHTML = "First Name Is Required";
              first_name.focus();
              return false;
          } else {
              document.getElementById('first-name-danger').innerHTML = "";
          }

          if (last_name.value == "" || regName.test(last_name.value)) {
              document.getElementById('last-name-danger').innerHTML = "Last Name Is Required";
              last_name.focus();
              return false;
          } else {
              document.getElementById('last-name-danger').innerHTML = "";
          }

          if (date.value == "" || regDate.test(date.value)) {
              document.getElementById('date-danger').innerHTML = "Booking Date Is Required And Must Valid Date";
              date.focus();
              return false;
          } else {
              document.getElementById('date-danger').innerHTML = "";
          }

          if (time.checked == false || time.checked == "") {
              document.getElementById('time-danger').innerHTML = "Booking Time Is Required";
              time.focus();
              return false;
          } else {
              document.getElementById('time-danger').innerHTML = "";
          }

          if (reason.selectedIndex <= 0 || reason.checked == "") {
              document.getElementById('reason-danger').innerHTML = "Appointment Reason Is Required";
              reason.focus();
              return false;
          } else {
              document.getElementById('reason-danger').innerHTML = "";
          }

          return true;
      }
      client_validation();
  </script>