using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Stemwijzer
{
    internal class Partystatement
    {
        public int PartyID { get; set; }
        public int StatementID { get; set; }
        public string StatementText { get; set; }
        public int ElectionID { get; set; }
    }
}
