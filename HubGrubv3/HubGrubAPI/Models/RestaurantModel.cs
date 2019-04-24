using System.ComponentModel.DataAnnotations;

namespace HubGrubAPI.Models
{
    public class RestaurantModel
    {
        [Key]
        public int RestaurantID { get; set; }
        public string RestaurantName { get; set; }
        public string RestaurantHours { get; set; }
        public string RestaurantAddress { get; set; }
        public int RestaurantPhoneNumber { get; set; }
    }
}