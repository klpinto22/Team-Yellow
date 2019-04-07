using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace HubGrubAPI.Models
{
    public class HubGrubDBContext : DbContext
    {
        public HubGrubDBContext(DbContextOptions<HubGrubDBContext> options) : base(options) { }

        public HubGrubDBContext() { }

        public DbSet<RestaurantModel> RestaurantModel { get; set; }

        public DbSet<DishModel> DishModel { get; set; }
    }
}
