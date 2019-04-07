using HubGrubAPI.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace HubGrubAPI.Controllers
{
    [Route("api/[controller]")]
    public class RestaurantController
    {
        private HubGrubDBContext _context;

        public RestaurantController(HubGrubDBContext context)
        {
            _context = context;
        }

        [HttpGet]
        public async Task<IEnumerable<RestaurantModel>> Get() => await _context.RestaurantModel.AsNoTracking().ToListAsync();
    }
}
