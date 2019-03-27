using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace HubGrubv2.Models
{
    public class RestaurantModel : DbContext
    {
        [Key]
        public string RestuarantName { get; set; }
        public string RestaurantApps { get; set; }
        public string RestaurantEntrees { get; set; }
        public string RestaurantDeserts { get; set; }
        public string RestaurantDrinks { get; set; }
    }
}


