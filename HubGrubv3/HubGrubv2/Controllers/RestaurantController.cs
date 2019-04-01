using HubGrubv2.Models;
using Microsoft.AspNetCore.Mvc;
using System.Linq;

namespace HubGrubv2.Controllers
{
    public class RestaurantController : Controller
    {
        AppDbContext dbcontext = new AppDbContext();

        public IActionResult Index()
        {
            return View(dbcontext.RestaurantModel.ToList());
        }
        
    }
}
