using System.ComponentModel.DataAnnotations;

namespace HubGrubAPI.Models
{
    public class DishModel
    {
        [Key]
        public int DishID { get; set; }
        public int RestaurantID { get; set; }
        public string DishName { get; set; }
        public double DishPrice { get; set; }
    }
}