/**
 * DONATE BANNER DISPLAY
 * 		will appear after a 10 second delay, or if the user scrolls near the end of the page
 * 		and then uses localStorage for dismiss options, outlined below:
 *
 * DISSMISS BANNER actions:
 * 		- default of "remind me later" hides the banner for a random time (between 4 hours and 2 days)
 *  	- 'already donated' option hides the banner for 30 days
 * 		- 'never show again' will hide the banner permanently
 *
 */
document.addEventListener('DOMContentLoaded', function () {
  const banner = document.getElementById('donate_banner');
  const closeBtn = document.getElementById('close_banner');
  const dismissOptions = document.getElementById('dismiss_options');

   // Retrieve dismiss state and timestamps from localStorage
  const dismissState = localStorage.getItem('donate-banner-dismiss');
  const dismissTimestamp = localStorage.getItem('donate-banner-timestamp');

  // Check if the banner should be shown based on state and time
  if (dismissState === 'never-show-again') return;
  if (dismissState === 'already-donated' && withinDays(dismissTimestamp, 30)) return;

  // Show the banner after 10 seconds or near end of the page
  let timer = setTimeout(showBanner, 10000); // 10-second delay
  window.addEventListener('scroll', () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200) {
      clearTimeout(timer);
      showBanner();
    }
  });

  // Handle close button and dismiss option clicks
  closeBtn.addEventListener('click', handleDismiss);
  dismissOptions.addEventListener('click', (e) => {
    if (e.target.name === 'dismiss') {
      handleDismiss(e);
    }
  });

  function handleDismiss(e) {
    const value = e.target.value || 'remind-later'; // Default to "remind-later"
    const timestamp = Date.now();

    // Save dismiss state and timestamp in localStorage
    localStorage.setItem('donate-banner-dismiss', value);
    localStorage.setItem('donate-banner-timestamp', timestamp);

    // Set a reminder for "remind-later"
    if (value === 'remind-later') {
      const remindLaterTime = timestamp + getRandomMillis(.16, 2); // 4 hours to 2 days
      localStorage.setItem('donate-banner-remind-later', remindLaterTime);
    }

    banner.classList.add('hidden');
  }

  function showBanner() {
    const remindLaterTime = localStorage.getItem('donate-banner-remind-later');
    if (remindLaterTime && Date.now() < remindLaterTime) return; // Still in "remind-later" period
    banner.classList.remove('hidden');
  }

  function withinDays(timestamp, days) {
    const elapsed = (Date.now() - parseInt(timestamp, 10)) / (1000 * 60 * 60 * 24);
    return elapsed < days;
  }

  function getRandomMillis(minDays, maxDays) {
    const randomDays = Math.random() * (maxDays - minDays) + minDays;
    return randomDays * 24 * 60 * 60 * 1000; // Convert days to milliseconds
  }
});