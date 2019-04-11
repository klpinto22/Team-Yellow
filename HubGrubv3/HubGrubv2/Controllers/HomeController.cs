using HubGrubv2.Models;
using Microsoft.AspNetCore.Mvc;
using System.Diagnostics;

namespace HubGrubv2.Controllers
{
    public class HomeController : Controller
    {
        public IActionResult Index()
        {
            if(User.Identity.IsAuthenticated)
            {
                //if the user is authenticated redirect them to their homepage
                //return RedirectToAction("Dashboard", "Home");
            }

            //if they're not, send them to the public homepage
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}
