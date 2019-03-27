using HubGrubv2.Models;
using Microsoft.AspNetCore.Mvc;
using System.Linq;

namespace HubGrubv2.Controllers
{
    public class RestaurantController : Controller
    {
        //public RestaurantController(AppDbContext context)
        //{
        //    _context = context;
        //}

        AppDbContext dbcontext = new AppDbContext();

        public IActionResult Index()
        {

            return View(dbcontext.RestaurantModel.ToList());
        }


        //private bool RestaurantModelExists(string id)
        //{
        //    return _context.RestaurantModel.Any(e => e.RestuarantName == id);
        //}
    }
}
