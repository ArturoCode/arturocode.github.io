function enableLightMode() {
    document.body.classList.toggle("light-mode");
  }
  
  const isLightMode = () =>
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: light)").matches;
  
  if (isLightMode()) {
      enableLightMode();
    }
  
  function enableDarkMode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
  }
  
  const isDarkMode = () =>
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches;
  
  if (isDarkMode()) {
    enableDarkMode();
  }