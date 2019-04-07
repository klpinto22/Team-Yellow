using HubGrubv2.Models;
using Microsoft.AspNetCore.Mvc;
using System.Linq;
using System.Net.Http;

namespace HubGrubv2.Controllers
{
    public class RestaurantController : Controller
    {
        public IList<RestaurantModel> Restaurants { get; private set; }

        public IActionResult Index()
        {
            var request = new HttpRequestMessage(HttpMethod.Get, "api/restaurant");
            var client = _clientFactory.CreateClient("HubGrubAPI");
            HttpResponseMessage response = await client.SendAsync(request);

            if (response.IsSuccessStatusCode)
            {
                Restaurants = await response.Content.ReadAsAsync<IList<RestaurantModel>>();
            }

            return View(Restaurants);
        }
        
    }
}
