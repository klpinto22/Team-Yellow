using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;

namespace HubGrubv2.Data
{
    public class DataAccess
    {
        public string GetConnectionString()
        {
            return ConfigurationManager.ConnectionStrings["DefaultConnection"].ConnectionString;
        }

        //public static List<T> LoadData<T>(string sql, T data)
        //{
        //    using (IDbConnection cnn = new SqlConnection(GetConnectionString()))
        //    {

        //    }
        //}
    }
}
