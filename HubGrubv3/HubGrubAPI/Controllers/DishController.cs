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
    public class DishController
    {
        private HubGrubDBContext _context;

        public DishController(HubGrubDBContext context)
        {
            _context = context;
        }

        [HttpGet]
        public async Task<IEnumerable<DishModel>> Get() => await _context.DishModel.AsNoTracking().ToListAsync();
    }
}
