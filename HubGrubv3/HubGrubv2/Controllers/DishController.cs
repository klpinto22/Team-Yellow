using HubGrubv2.Models;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace HubGrubv2.Controllers
{
    public class DishController : Controller
    {
        //comment
        AppDbContext dbcontext = new AppDbContext();

        public IActionResult Index()
        {
            return View(dbcontext.DishModel.ToList());
        }
    }
}