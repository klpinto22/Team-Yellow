using HubGrubv2.Models;
using Microsoft.AspNetCore.Mvc;
using System.Collections.Generic;
using System.Net.Http;
using System.Threading.Tasks;

namespace HubGrubv2.Controllers
{
    public class RestaurantController : Controller
    {
        private readonly IHttpClientFactory _clientFactory;
        public IList<RestaurantModel> Restaurants { get; private set; }

        public RestaurantController(IHttpClientFactory clientFactory)
        {
            _clientFactory = clientFactory;
        }

        public async Task<IActionResult> Index()
        {
            var request = new HttpRequestMessage(HttpMethod.Get, "api/restaurant");
            var client = _clientFactory.CreateClient("HubGrubAPI");
            HttpResponseMessage response = await client.SendAsync(request);

            if (response.IsSuccessStatusCode)
            {
                Restaurants = await response.Content.ReadAsAsync<IList<RestaurantModel>>();
                return View(Restaurants);
            }

            return RedirectToAction("Index", "Home");
        }

    }
}
