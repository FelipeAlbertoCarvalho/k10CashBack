$(function () {
  const subMenu = $(".nav-logout ul li ul");
  $("#nav-avatar").click(function (e) {
    e.preventDefault();
    subMenu.toggle(300);
  });

  $("header + *").click(function () {
    if (subMenu.is(":visible") === true) {
      subMenu.hide(400);
    }
  });

  // dashboard
  const iconNav = $(".nav-logo i");
  const windowSize = $(window)[0].innerWidth;
  const dashboard = $(".dashboard");
  let open = true;
  if (windowSize <= 768) {
    dashboard.css({ width: "0", padding: "0" });
    open = false;
  }

  iconNav.click(function () {
    if (open) {
      dashboard.animate({ width: "0", padding: "0" }, function () {
        open = false;
      });
    } else {
      dashboard.animate({ width: "300", padding: "5" }, function () {
        open = true;
      });
      if (windowSize > 768) dashboard.css({ width: "300", padding: "5" });
    }
  });

  $(window).resize(function () {
    const windowSize = $(window)[0].innerWidth;
    
    if (windowSize <= 768) {
      dashboard.css({width: "0", "padding": "0"});
      open = false;
    } else {
      dashboard.css({width: "300", padding: "5"});
      open = true;
    }
  });
});
