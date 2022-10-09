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
  </script>